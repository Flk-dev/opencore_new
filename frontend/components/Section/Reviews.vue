<template>
  <section class="reviews section" v-if="select.length">
    <div class="reviews__container container">
      <GlobalBlockHeader classes="reviews" :title="title" />
      <swiper
          class="reviews__swiper"
          :slides-per-view="1.1"
          :space-between="10"
          :breakpoints="{ '576': { slidesPerView: 1.6 }, '992': { slidesPerView: 3 } }"
      >
        <swiper-slide v-for="item in select" :key="item.id">
          <ReviewsBigCard
              :id="item.post_id"
              :name="item.post_title"
              :title="item.title"
              :post="item.post"
              :text="item.text_home"
              :logo="item.logo"
              :cases="item.case"
          />
        </swiper-slide>
      </swiper>
      <UIButton
        title="Все отзывы"
        class="reviews__button"
        to="reviews"

      />
    </div>
  </section>
</template>

<script setup lang="ts">
import { Swiper, SwiperSlide } from 'swiper/vue';
import 'swiper/css';

defineProps<{
  select: object,
  title?: string
}>();
</script>

<style scoped lang="scss">
.reviews__block-header {
  & :deep(.block-header__title) {
    max-width: 100rem;
  }
}

.reviews__swiper .swiper-slide {
  height: auto;
}

.reviews__button {
  margin-top: 4rem;

  @media (max-width: $mobile) {
    margin-top: 6rem;
  }
}

.reviews__slider  {
  @media (max-width: $tablet) {
    margin-right: var(--m-m-container);
  }
}

</style>