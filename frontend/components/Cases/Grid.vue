<template>
  <div
      class="cases__parallax"
      v-if="columns.value && columns.value.colLeft.length"
      ref="grid"
  >
    <div class="cases__line"></div>
    <div class="cases__grid">
      <div class="cases__col" ref="colLeft">
        <CasesCard
            v-for="item in columns.value.colLeft"
            :key="item.post_id"
            :slug="item.post_slug"
            :title="item.post_title"
            :image="item.image"
            :subtitle="item.subtitle"
            :categories="item.categories"
            :add_border="item.add_border"
        />
      </div>
      <div class="cases__col cases__col--right" ref="colRight">
        <CasesCard
            v-for="item in columns.value.colRight"
            :key="item.post_id"
            :slug="item.post_slug"
            :title="item.post_title"
            :image="item.image"
            :subtitle="item.subtitle"
            :categories="item.categories"
            :add_border="item.add_border"
        />
      </div>
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
        trigger:".cases__grid",
        start:"top top",
        end:"bottom bottom",
        scrub: true,
      }
    });

    tl.to('.cases__col--right', {
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
.cases__parallax {
  margin: 0 calc( -1 * var(--p-container) );
  position: relative;

  &:before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 0;
    border-bottom: 1.5px solid var(--fg-blue);
    transition: width 3s;

    @media (max-width: $tablet) {
      display: none;
    }
  }
}

.cases__grid {
  display: flex;

  &--active:before {
    width: 100%;
  }

  @media (max-width: $tablet) {
    flex-direction: column;
    margin: 0;
  }
}

.cases__line {
  position: absolute;
  left: 50%;
  transform: translateX(-50%);
  top: 0;
  border-right: 1.5px solid var(--fg-blue);
  height: 100%;
  transition: height 3s;

  @media (max-width: $tablet) {
    display: none;
  }
}

.cases__col {
  &:first-child {
    :deep(.cases-item:nth-child(2n + 1)) {
      max-width: 52rem;
      margin-left: auto;
      --image-height: 31rem;
    }
  }

  &:last-child {
    :deep(.cases-item:nth-child(2n + 2)) {
      max-width: 52rem;
      --image-height: 31rem;
    }
  }

  @media (max-width: $tablet) {
      :deep(.cases-item__title) {
        max-width: 80%;
      }
  }

  @media (max-width: $mobile) {
      :deep(.cases-item__title) {
        max-width: 100%;
      }
  }
}

.cases__col {
  width: 50%;
  padding: 2rem 1.5rem 0 var(--p-container);
  position: relative;

  @media (max-width: $tablet) {
    padding: 0 var(--p-container)
  }

  &:last-child {
    padding-left: 1.5rem;
    padding-right: var(--p-container);

    &:after {
      display: none;
    }

    & .cases-item._small {
      margin-left: 0;
    }
  }

  @media (max-width: $tablet) {
    width: 100%;
    border-top: none;
  }

  @media (max-width: $mobile) {

  }
}
</style>