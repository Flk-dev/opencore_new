<template>
  <div class="hero__slider">
    <swiper
        class="hero__slider-swiper"
        :free-mode="true"
        slides-per-view="auto"
        :mousewheel="true"
        :space-between="100"
    >
      <swiper-slide>
        <div class="hero__slider-item">
          <img src="/img/hero/logos/logo-1.svg" alt="">
        </div>
      </swiper-slide>
      <swiper-slide>
        <div class="hero__slider-item">
          <img src="/img/hero/logos/logo-2.svg" alt="">
        </div>
      </swiper-slide>
      <swiper-slide>
        <div class="hero__slider-item">
          <img src="/img/hero/logos/logo-3-new.svg" alt="">
        </div>
      </swiper-slide>
      <swiper-slide>
        <div class="hero__slider-item">
          <img src="/img/hero/logos/logo-4.svg" alt="">
        </div>
      </swiper-slide>
    </swiper>
  </div>
</template>

<script setup lang="ts">
import {Swiper, SwiperSlide} from "swiper/vue";
</script>

<style scoped lang="scss">
.hero__slider {
  position: absolute;
  bottom: 22.5rem;

  :deep(.swiper-slide) {
    width: 26rem !important;
  }

  @media (max-width: $tablet) {
    position: relative;
    bottom: 0;
    margin: 0 var(--m-m-container);
  }

  &-item img {
    width: 100%;
    height: auto
  }
}
</style>