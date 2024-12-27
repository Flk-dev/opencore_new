<template>
  <section class="speakers section">
    <div class="speakers__container container">
      <BlockHeader :title="title" classes="speakers" />
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
.speakers-gallery__swiper {
  margin-right: var(--m-m-container);
}

.speakers__block-header {
  margin-bottom: 4rem;
}

</style>