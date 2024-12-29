<template>
  <section class="slider-logos section" v-if="slider.length">
    <div class="slider-logos__container container">
      <GlobalBlockHeader :title="title" classes="slider-logos" />
      <div class="slider-logos__slider">
        <swiper
            class="slider-logos__swiper"
            :slides-per-view="1.5"
            :space-between="22"
            :loop="true"
            :breakpoints="{ '767': { slidesPerView: 2.55 }, '992': { slidesPerView: 5 } }"
        >
          <swiper-slide v-for="slide in slider">
            <div class="slider-logos__item">
              <img :src="slide" alt="">
            </div>
          </swiper-slide>
        </swiper>
      </div>
    </div>
  </section>
</template>

<script setup lang="ts">
import { Swiper, SwiperSlide } from 'swiper/vue';
import 'swiper/css';

defineProps<{
  title?: string,
  slider: object
}>();
</script>

<style scoped lang="scss">
.slider-logos__slider {
  margin-left: var(--m-m-container);
  margin-right: var(--m-m-container);
}

.slider-logos__block-header {
  max-width: 72.4rem;
  margin-bottom: 4rem;
}

.slider-logos__item {
  height: 11.2rem;
  display: flex;
  align-items: center;
  justify-content: center;
}
</style>