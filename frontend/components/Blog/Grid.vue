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
    <div class="blog__col" ref="colRight">
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
// import { gsap } from "gsap";
// import { ScrollTrigger } from "gsap/ScrollTrigger";


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

  // gsap.registerPlugin(ScrollTrigger);
  // ScrollTrigger.defaults({
  //   markers: false
  // });

  // let tl = gsap.timeline({
  //   scrollTrigger: {
  //     pin: ".blog__grid",
  //     trigger: ".blog__grid",
  //     start: "top top",
  //     end: 'bottom bottom',
  //     markers: true,
  //     scrub: 1,
  //     pinSpacing: false,
  //   }
  // });

  // tl.to(
  //     colLeft.value,
  //     {
  //       duration: 4,
  //       y: () => -1 * (colLeft.value.offsetHeight - window.innerHeight)
  //     },
  //     0
  // )
  //     .from(
  //         colRight.value,
  //         {
  //           duration: 4,
  //           y: () => -1 * (colRight.value.offsetHeight - window.innerHeight)
  //         },
  //         0
  //     );

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
    :deep(.blog-item:first-child) {
      margin-top: 17rem;

      @media (max-width: $mobile) {
        margin-top: 0;
      }
    }

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