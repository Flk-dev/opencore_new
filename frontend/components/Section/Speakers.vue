<template>
  <section class="speakers section">
    <div class="speakers__container container">
      <GlobalBlockHeader :title="title" classes="speakers" />
      <div class="speakers-gallery__slider">
        <swiper
            class="speakers-gallery__swiper"
            :slides-per-view="1"
            :space-between="30"
            :breakpoints="{ '576': { slidesPerView: 1.5 } }"
        >
          <swiper-slide v-for="(item, index) in data" :key="item.id">
            <SpeakersCard
                :id="item.post_id"
                :title="item.post_title"
                :post="item.post"
                :experience="item.experience"
                :image="item.image"
            />
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
  data: object
}>();
</script>

<style scoped lang="scss">
.speakers-gallery__slider {
  margin: 0 var(--m-m-container);
}

.speakers-gallery__swiper {
  padding: 0 var(--p-container);
}

.speakers__block-header {
  margin-bottom: 4rem !important;
}

</style>