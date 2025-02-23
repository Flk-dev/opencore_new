<template>
  <div
      class="cases__parallax"
      v-if="columns.value && columns.value.colLeft.length"
      ref="cases"
      v-intersection-observer="onIntersectionObserver"
  >
    <div class="cases__line" ref="line"></div>
    <div class="cases__grid" ref="grid" :style="{'--height': casesHeight ? casesHeight + 'px' : 'auto'}">
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
import { vIntersectionObserver } from '@vueuse/components';

const props = defineProps<{
  data: string[]
}>();

const cases = ref(null);
const grid = ref(null);
const line = ref(null);

const {width: windowWidth} = useWindowSize();
const {height: casesHeight} = useElementSize(cases);

const onIntersectionObserver = ([entry]: IntersectionObserverEntry[]) => {
  if (entry.isIntersecting) {
    entry.target.classList.add("cases__parallax--active");
  }
}

const columns = computed(() => {
  const data: Ref = ref({
    colLeft: [],
    colRight: [],
  });

  if (windowWidth.value < 992) {
    data.value.colLeft = props.data;
    data.value.colRight = [];
  } else {
    props.data.forEach((element: any, index: number) => {
      let key = index;
      key += 1;
      if (key % 2 === 0 || ( props.data.length - 1 ) === index) {
        data.value.colRight.push(element);
      } else {
        data.value.colLeft.push(element);
      }
    });
  }

  return data;
});

onMounted( () => {
  let tl = gsap.timeline({
    scrollTrigger: {
      trigger: ".cases__grid",
      start:"top top",
      end: () => "+=" + casesHeight.value,
      scrub: true,
    }
  });

  tl.to('.cases__col--right', {
    duration: 2,
    y: '-=' + (grid.value.querySelector('.cases-item:nth-child(2)').getBoundingClientRect().height * 1.25),
  });

  gsap.set(line.value, {transformOrigin: "center top", xPercent: -50, x: 0});

  gsap.fromTo(line.value, {
    scaleY: 0,
  }, {
    scaleY: 1,
    ease: "none",
    scrollTrigger: {
      trigger: grid.value,
      start: 0,
      end: () => "+=" + casesHeight.value,
      markers: true,
      scrub: true,
    }
  });
} )
</script>

<style scoped lang="scss">
.cases__parallax {
  margin: 0 calc( -1 * var(--p-container) );
  position: relative;

  &--active {
    .cases__col:before {
      width: 100%;
    }

    .cases__line {
      height: 100%;
    }
  }
}

.cases__grid {
  display: flex;
  height: var(--height);

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
  border-right: .15rem solid var(--fg-blue);
  height: 100%;
  transition: height 3s;
  transition-delay: .6s;

  @media (max-width: $tablet) {
    display: none;
  }
}

.cases__col {
  width: 50%;
  padding: 2rem 1.5rem 0 var(--p-container);
  position: relative;

  &:before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 0;
    height: .15rem;
    background: var(--fg-blue);
    transition: width .5s;
  }

  &:first-child {
    :deep(.cases-item:nth-child(2n + 1)) {
      max-width: 52rem;
      margin-left: auto;
      --image-height: 31rem;
    }
  }

  &:last-child {
    padding-left: 1.5rem;
    padding-right: var(--p-container);

    &:after {
      content: '';
    }

    &:before {
      left: auto;
      right: 0;
    }

    :deep(.cases-item:nth-child(2n + 2)) {
      max-width: 52rem;
      --image-height: 31rem;
    }
  }

  @media (max-width: $tablet) {
    padding: 0 var(--p-container);

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

//.cases__col {
//  width: 50%;
//  padding: 2rem 1.5rem 0 var(--p-container);
//  position: relative;
//
//  @media (max-width: $tablet) {
//    padding: 0 var(--p-container)
//  }
//
//  &:last-child {
//    padding-left: 1.5rem;
//    padding-right: var(--p-container);
//
//    &:after {
//      display: none;
//    }
//
//    & .cases-item._small {
//      margin-left: 0;
//    }
//  }
//
//  @media (max-width: $tablet) {
//    width: 100%;
//    border-top: none;
//  }
//
//  @media (max-width: $mobile) {
//
//  }
//}
</style>