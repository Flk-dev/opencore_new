<template>
  <div class="blog__grid" v-if="columns.value && columns.value.colLeft.length">
    <div class="blog__col" ref="colLeft">
      <BlogCard
          v-for="item in columns.value.colLeft"
          :key="item.post_id"
          :title="item.post_title"
          :slug="item.post_slug"
          :image="item.image"
          :time-read="item.time_read"
          :categories="item.categories"
      />
    </div>
    <div class="blog__col blog__col--right" ref="colRight">
      <BlogCard
          v-for="item in columns.value.colRight"
          :key="item.post_id"
          :title="item.post_title"
          :slug="item.post_slug"
          :image="item.image"
          :time-read="item.time_read"
          :categories="item.categories"
      />
    </div>
  </div>
</template>

<script setup lang="ts">
import { gsap } from "gsap";
import { ScrollTrigger } from "gsap/ScrollTrigger";


const props = defineProps<{
  data: object
}>();

const windowWidth = ref( 0 );
const setWindowWidth = () => {
  windowWidth.value = window.innerWidth;
}

const colLeft = ref( null );
const colRight = ref( null );

onMounted( () => {
  setWindowWidth();
  window.addEventListener('resize', setWindowWidth);

  gsap.registerPlugin(ScrollTrigger);
  ScrollTrigger.defaults({
    markers: false
  });

  let mm = gsap.matchMedia();
  mm.add("(min-width: 992px)", () => {
    let tl = gsap.timeline({
      scrollTrigger: {
        trigger:".blog__grid",
        start:"top top",
        end:"bottom bottom",
        scrub: true,
      }
    });

    tl.to('.blog__col--right', {
      duration: 2,
      y: -250,
    }, 0);
  });
} )

const columns = computed(() => {
  const data: object = ref({
    colLeft: [],
    colRight: [],
  });

  if (windowWidth.value < 992) {
    data.value.colLeft = props.data;
    data.value.colRight = [];
  } else {
    props.data.forEach((element, index) => {
      index += 1;
      if (index % 2 === 0) {
        data.value.colRight.push(element);
      } else {
        data.value.colLeft.push(element);
      }
    });
  }

  return data;
});


</script>

<style scoped lang="scss">
.spacer {
  height: 100vh;
}

.list-enter-active,
.list-leave-active {
  transition: opacity 0.3s, transform .5s;
}
.list-enter-from,
.list-leave-to {
  opacity: 1;
  transform: translateY(-20%);
}

.blog__grid {
  display: grid;
  grid-template-columns: repeat(2, 1fr);
  gap: 3rem;

  @media (max-width: $tablet) {
    grid-template-columns: 1fr;
    row-gap: 8rem;
  }
}

.blog__col {
  &:first-child {
    :deep(.blog-item:nth-child(2n + 1)) {
      max-width: 52rem;
      margin-left: auto;
      --image: 31rem;

      & .blog-item__title {
        max-width: 100%;
      }
    }
  }

  &:last-child {
    :deep(.blog-item:nth-child(2n + 2)) {
      max-width: 52rem;
      --image: 31rem;

      & .blog-item__title {
        max-width: 100%;
      }
    }
  }
}
</style>