<template>
  <section class="reviews section" v-if="select.length">
    <div class="reviews__container container">
      <GlobalBlockHeader classes="reviews" :title="title" class-title="fz-h1--tablet" />
      <div class="reviews__cursor fz-caption" ref="reviewsCursor">смотреть кейс</div>

      <div class="reviews__slider" @mousemove="changeCursor">
        <swiper
            class="reviews__swiper"
            :slides-per-view="1.1"
            :space-between="10"
            :breakpoints="{ '576': { slidesPerView: 1.57 }, '992': { slidesPerView: 3 } }"
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
                :full="item.full"
            />
          </swiper-slide>
        </swiper>
      </div>
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

const reviewsCursor = ref( null );
const changeCursor = ( event: any ) => {

  const x = event.clientX;
  const y = event.clientY;

  reviewsCursor.value.style.left = x + 'px';
  reviewsCursor.value.style.top = y + 'px';
}
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
    //padding-left: var(--p-container);
    //padding-right: var(--p-container);
    margin-left: var(--m-m-container);
    margin-right: var(--m-m-container);

    & .reviews__swiper {
      padding: 0 var(--p-container)
    }
  }
}

.reviews__cursor {
  pointer-events: none;
  padding: 0 1rem;
  height: 3.1rem;
  border-radius: var(--br-secondary);
  background: var(--fg-blue);
  position: fixed;
  display: flex;
  align-items: center;
  justify-content: center;
  color: var(--fg-white);
  z-index: 10;
  transform: translate(-50%, -50%);
  opacity: 0;
  transition: opacity .3s;

  &--active {
    opacity: 1;
  }

  @media (max-width: $tablet) {
    display: none;
  }
}

</style>