<template>
  <div class="career__history career-history">
    <div class="career-history__container container">
      <GlobalBlockHeader :title="data.title" classes="career-history"/>
      <swiper
          class="speakers-gallery__swiper"
          :slides-per-view="3"
          :space-between="20"
      >
        <swiper-slide v-for="(item, index) in data.select" :key="item.id">
          <HistoryCard
              :id="item.post_id"
              :title="item.post_title"
              :subtitle="item.subtitle"
              :image="item.image"
          />
        </swiper-slide>
      </swiper>
    </div>
  </div>
</template>

<script setup lang="ts">
import { Swiper, SwiperSlide } from 'swiper/vue';
import 'swiper/css';

defineProps<{
  data: {
    title?: string,
    select?: object
  },
}>();
</script>

<style scoped lang="scss">
.career__history {
  margin-top: 10.3rem;
}

.career-history__block-header {
  margin-bottom: var(--mb-block-header-secodary);
}

</style>