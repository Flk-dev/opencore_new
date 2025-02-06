<template>
  <div class="circle" :style="{ height: roundHeight + 'px' }">
    <div class="circle__round" :style="{ height: roundHeight + 'px' }">
      <div :style="{ height: roundHeightDiv + 'px' }"></div>
    </div>
    <div class="circle__list">
      <div
          class="circle-item"
          v-for="(item, key) in list"
          :class="['circle-item--'+key]"
          ref="items"
          v-intersection-observer="onIntersectionObserver"
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
</template>

<script setup lang="ts">
import { vIntersectionObserver } from '@vueuse/components'

defineProps<{
  list: Array<string>;
}>();

const items = ref( [] );
const roundHeight = ref( 110 );
const roundHeightDiv = ref( 110 );

onMounted( () => {
  items.value.forEach((item: any) => {
    roundHeightDiv.value += item.getBoundingClientRect().height;
    item.style.opacity = 0;
  });
} )

const onIntersectionObserver = ([entry]: IntersectionObserverEntry[]) => {
  if (entry?.isIntersecting) {
    if ( ! entry.target.classList.contains( 'circle-item--active' ) ) {
      roundHeight.value += (entry.target.getBoundingClientRect().height);
    }

    entry.target.classList.add('circle-item--active');
  }
}
</script>

<style scoped lang="scss">
.circle {
  position: relative;

  &__list {
    padding: 5.5rem 0;
  }

  &__round {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 0;
    overflow: hidden;
    transition: height 2s;

    & div {
      border: 1.5px solid var(--fg-white);
      width: 100%;
      border-radius: 50%;
    }

    @media (max-width: $mobile) {
      display: none;
    }
  }

  &-item {
    border-radius: 50%;
    border: 1.5px solid var(--fg-white);
    width: 87.5rem;
    max-width: 100%;
    height: 23.7rem;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    margin: 0 auto;
    text-align: center;
    opacity: 0;
    transition-duration: 3s;
    transition: opacity 3s;

    @media (max-width: $tablet) {
      width: 40.7rem;
      height: 14.1rem;
    }

    &--1,
    &--3 {
      width: 128.5rem;
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