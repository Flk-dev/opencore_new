<template>
  <div class="partner__gallery partner-gallery" :class="classes + '__partner-gallery'">
    <div class="partner-gallery__container container">
      <swiper
          class="partner-gallery__swiper"
          :slides-per-view="5"
          :loop="true"
          :space-between="20"
      >
          <swiper-slide v-for="(item, index) in data" :key="index">
            <div class="partner-gallery__item item--cover">
              <img :src="item" alt="">
            </div>
          </swiper-slide>
      </swiper>
    </div>
  </div>
</template>

<script setup lang="ts">
import { Swiper, SwiperSlide } from 'swiper/vue';
import 'swiper/css';

defineProps<{
  classes?: string,
  data: object,
}>();

</script>

<style scoped lang="scss">

.partner-gallery {
  margin-top: 8rem;
}

.partner-gallery__item {
  padding-bottom: 98.5%;
  border-radius: var(--br-regular);
  overflow: hidden;
}

</style>