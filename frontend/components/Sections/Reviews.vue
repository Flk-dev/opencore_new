<template>
  <section class="reviews section" v-if="select.length">
    <div class="reviews__container container">
      <BlockHeader classes="reviews" :title="title" />
      <swiper
          class="speakers-gallery__swiper"
          :slides-per-view="1.1"
          :space-between="10"
          :breakpoints="{ '576': { slidesPerView: 1.6 }, '992': { slidesPerView: 3 } }"
      >
        <swiper-slide v-for="(item, index) in select" :key="item.id">
          <ReviewsBigCard
              :id="item.post_id"
              :name="item.post_title"
              :title="item.title"
              :post="item.post"
              :text="item.text_home"
              :logo="item.logo"
          />
        </swiper-slide>
      </swiper>
      <NuxtLink to="reviews" class="reviews__button btn btn--ripple">
        <span>Все отзывы</span>
      </NuxtLink>
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
  & .block-header__title {
    max-width: 105rem;
  }

  @media (max-width: $tablet) {
    margin-bottom: 6rem;
  }

  @media (max-width: $mobile) {
    margin-bottom: 4rem;
  }
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