<template>
  <div class="circle">
<!--    <div class="circle__round" :style="{ height: height + '%' }">-->
<!--      <div :style="{ height: setToRem(listHeight + (55 * 2)) }"></div>-->
<!--    </div>-->
    <div class="circle__list" ref="listRef">
      <svg class="circle__round" ref="circle" width="1400" height="1400" viewBox="0 0 1400 1400" fill="none" xmlns="http://www.w3.org/2000/svg">
        <circle cx="700" cy="700" r="699.25" stroke="white" stroke-width="1.5"/>
      </svg>
      <div class="circle__row">
        <div
            class="circle-item"
            v-for="(item, key) in list"
            :class="['circle-item--'+key]"
            ref="items"
        >
          <div class="circle-item__content">
            <h3 class="circle-item__title fz-h4--tablet fz-h2--mobile">
              {{ item.title }}
            </h3>
            <div class="circle-item__text content__text" v-if="item.text" v-html="item.text"></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
import Vivus from "vivus";
import { gsap } from "gsap";
import { ScrollTrigger } from "gsap/ScrollTrigger";

defineProps<{
  list: Array<{
    title?: string,
    text?: string,
  }>;
}>();

const circle: Ref = ref( null );
const vivusCircle: Ref = ref( null );
const items = ref( [] );
const listRef: Ref = ref( null );

let tl: any;

onMounted( () => {
  vivusCircle.value = new Vivus(
      circle.value,
      {
        //start: 'manual',
        duration: 200,
        animTimingFunction: Vivus.EASE,
        pathTimingFunction: Vivus.EASE,
      }
  );

  tl = gsap.timeline({
    scrollTrigger: {
      trigger: '.career-values__block',
      start: `-20% top`,
      end: `bottom bottom`,
      scrub: false,
      markers: false,
    }
  });

  items.value.forEach( (item: any, i) => {
    tl.to( item, {
      opacity: 1,
      duration: .5,
      onComplete: () => {
        if ( i === 1 ){
          vivusCircle.value.play();
        }
      }
    } );
  });
} )
</script>

<style scoped lang="scss">
.circle {
  position: relative;

  &__list {
    position: relative;
  }

  &__row {
    padding: 5.5rem 0;
  }

  &__round {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    left: 0;
    width: calc( 100% + (5.5rem * 2) );
    height: calc( 100% + (5.5rem * 2) );
  }

  &-item {
    border-radius: 50%;
    border: 1.5px solid var(--fg-white);
    width: 60%;
    max-width: 100%;
    height: 23.7rem;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    margin: 0 auto;
    text-align: center;
    opacity: 0;

    @media (max-width: $tablet) {
      width: 40.7rem;
      height: 14.1rem;
    }

    &--1,
    &--3 {
      width: 91.2%;
      height: 27.2rem;

      @media (max-width: $tablet) {
        width: 65.2rem;
        height: 14.1rem;
      }

      @media (max-width: $mobile) {
        width: 100% !important;
      }
    }

    &--2 {
      width: 100%;
      height: 27.2rem;

      @media (max-width: $tablet) {
        height: 14.1rem;
      }

      @media (max-width: $mobile) {
        width: 100% !important;
      }
    }

    @media (max-width: $mobile) {
      height: 14.2rem;
      width: 31.6rem;
      padding-left: 2.8rem;
      padding-right: 2.8rem;
    }

    &__content {
      max-width: 51rem;
      margin: 0 auto;
      text-align: center;
    }

    &__text {
      --fz: var(--fz-body-b);
      --lh: var(--lh-body-b);
      color: var(--fg-white-75);
      margin-top: 1rem;

      @media (max-width: $tablet) {
        --fz: 1.2rem;
        --lh: 1.2rem;
        max-width: 31.4rem;
      }
    }

    &--active {
      opacity: 1 !important;
    }
  }
}
</style>