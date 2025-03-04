<template>
  <div
      class="service-when"
      v-if="data.list"
      ref="services"
  >
    <div class="service-when__container container">
      <div class="service-when__block-header block-header">
        <h2 class="block-header__title fz-h2 fz-h1--tablet fz-h1--mobile" :style="{ minHeight: (height + 5) + 'px' }">
          <span class="_up _title" v-html="data.title" ref="title"></span>
          <span class="_up _mask" v-html="data.title_mask"></span>
        </h2>
      </div>
      <div class="service-when__grid" ref="grid">
        <div class="service-when__item" v-for="(item, key) in data.list" :key="key">
          <div class="service-when__card service-when__face">
            <h4 class="service-when__title fz-h2--mobile" v-if="item.face_title" v-html="item.face_title"></h4>
            <ContentText v-if="item.face_text" :text="fixText(item.face_text)" class="service-when__text" />
          </div>
          <div class="service-when__card service-when__back">
            <h4 class="service-when__title fz-h2--mobile" v-if="item.back_title" v-html="item.back_title"></h4>
            <ContentText v-if="item.back_text" :text="fixText(item.back_text)" class="service-when__text" />
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
import { gsap } from "gsap";
import { ScrollTrigger } from "gsap/ScrollTrigger";

defineProps<{
  data: {
    title?: string,
    title_mask?: string,
    list?: Array<{
      face_title?: string,
      face_text?: string,
      back_title?: string,
      back_text?: string,
    }>,
  }
}>();

gsap.registerPlugin(ScrollTrigger);
ScrollTrigger.defaults({
  markers: false
});

const title = ref( null );
const { height } = useElementSize( title );

const services: Ref = ref( null );
const grid: Ref = ref( null );
let tl;

onMounted( () => {
  tl = gsap.timeline({
    scrollTrigger: {
      trigger: '.service-when',
      pin: '.service-when__container',
      start: `center center`,
      end: `${(grid.value.getBoundingClientRect().height * 3.5)} bottom`,
      scrub: true,
      markers: true,
    }
  });

  tl.to('.service-when__item', {
    rotationY: -180,
    //easing: "easeInOutExpo",
  });

  tl.to('.block-header__title', {
    className: 'block-header__title block-header__title--active'
  });
} );
</script>

<style scoped lang="scss">
.service-when {
  margin-top: var(--mt-content-block);
  position: relative;
  overflow: hidden;

  $root: &;

  &__block-header {
    margin-bottom: var(--mb-block-header-third);

    @media (max-width: $mobile) {
      margin-bottom: 4rem;
    }

    & ._up {
      position: absolute;
      top: 0;
      left: 0;
      display: block;
      transition: all .3s;
    }

    & ._mask {
      margin-top: -10rem;
    }

    & .block-header__title {
      position: relative;
      overflow: hidden;

      &--active {
        & ._mask {
          margin-top: 0;
        }

        & ._title {
          margin-top: 10rem;
        }
      }
    }

  }

  &__grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 2rem;

    @media (max-width: $tablet) {
      grid-template-columns: repeat(2, 1fr);
    }

    @media (max-width: $mobile) {
      grid-template-columns: 1fr;
      gap: 1rem;
    }
  }

  &__item {
    position: relative;
    transform-style: preserve-3d;
    min-height: 30rem;

    @media (max-width: $mobile) {
      min-height: 19rem;
    }
  }

  &__card {
    border-radius: var(--br-regular);
    border: 1.5px solid var(--fg-blue);
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    padding: 2rem;
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    backface-visibility: hidden;
  }

  &__back {
    background: var(--fg-blue);
    color: var(--fg-white);
    transform: rotateY( 180deg );

    #{$root}__title {
      color: var(--fg-white);
    }
  }

  &__title {
    color: var(--fg-blue);
  }

  &__text {
    --fz: var(--fz-body-b);
    --lh: var(--fz-body-b);

    @media (max-width: $tablet) {
      --fz: var(--fz-caption);
      --lh: var(--lh-caption);
    }

    @media (max-width: $mobile) {
      --fz: var(--fz-body-b);
      --lh: var(--fz-body-b);
    }
  }
}

</style>