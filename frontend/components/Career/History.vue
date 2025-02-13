<template>
  <div class="career__history career-history">
    <div class="career-history__container container">
      <GlobalBlockHeader :title="data.title" classes="career-history" class-title="fz-h1--tablet"/>
      <div class="career-history__slider">
        <swiper
            class="career-history_swiper"
            :slides-per-view="1.2"
            :space-between="15"
            :breakpoints="{ '576': { slidesPerView: 1.6, spaceBetween: 20 }, '992': { slidesPerView: 3 } }"
        >
          <swiper-slide v-for="item in data.select" :key="item.id">
            <HistoryCard
                :id="item.post_id"
                :title="item.post_title"
                :subtitle="item.subtitle"
                :image="item.image"
                :text="item.text"
            />
          </swiper-slide>
        </swiper>
      </div>
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

  @media (max-width: $tablet) {
    margin-top: var(--mt-content-block);
  }
}

.career-history__block-header {
  margin-bottom: var(--mb-block-header-secodary);
}

.career-history__slider {
  @media (max-width: $tablet) {
    margin: 0 var(--m-m-container);
  }

  & .swiper-slide {
    height: auto !important;
  }
}

.career-history_swiper {
  @media (max-width: $tablet) {
    padding: 0 var(--p-container);
  }
}

</style>