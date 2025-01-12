<template>
  <section class="cases-slider section">
    <div class="cases-slider__container container">
      <GlobalBlockHeader :title="title" classes="cases-slider" />
      <div class="cases-slider__slider">
        <swiper
            class="cases-slider__swiper"
            :slides-per-view="1.05"
            :loop="true"
            :space-between="10"
            :breakpoints="{ '576': { slidesPerView: 'auto', spaceBetween: 20 } }"
        >
          <swiper-slide v-for="item in data" :key="item.post_id">
            <CasesCard
                :title="item.post_title"
                :image="item.image"
                :categories="item.categories"
                :subtitle="item.subtitle"
                :slug="item.post_slug"
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
  title: string,
  data: object
}>();
</script>

<style scoped lang="scss">
.cases-slider__slider {
  margin: 0 var(--m-m-container);
}

.cases-slider__block-header {
  margin-bottom: 6rem;
}

.cases-slider__swiper {
  padding-left: var(--p-container);

  & .swiper-slide {
    max-width: 68rem;

    &:nth-child(2n + 2) {
      max-width: 52rem;

      :deep(.cases-item__media-pic) {
        height: 30.5rem;
      }
    }
    
    @media (max-width: $mobile) {
      max-width: 34rem;
    }
  }
}

.cases-slider {
  :deep(.cases-item) {
    margin-bottom: 0;
  }
}
</style>