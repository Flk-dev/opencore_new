<template>
  <section class="cases-slider section">
    <div class="cases-slider__container container">
      <GlobalBlockHeader v-if="title" :title="title" classes="cases-slider" />
      <div class="cases-slider__slider" @mousemove="changeCursor">
        <UIPullCursor ref="cursor" />
        <swiper
            class="cases-slider__swiper"
            :slides-per-view="1.05"
            :loop="false"
            :space-between="10"
            :breakpoints="{ '576': { slidesPerView: 'auto', spaceBetween: 20 } }"
            @sliderMove="test"
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

const cursor = ref<object|null>( null );
const changeCursor = ( event: any ) => {
  const x = event.clientX;
  const y = event.clientY;

  if(cursor.value){
    cursor.value.$el.style.left = x + 'px';
    cursor.value.$el.style.top = y + 'px';
  }
}

const test = ( event: any, pos: any ) => {
  const x = pos.clientX;
  const y = pos.clientY;

  if( cursor.value ){
    cursor.value.$el.style.left = x + 'px';
    cursor.value.$el.style.top = y + 'px';
  }
}
</script>

<style scoped lang="scss">
.cases-slider__slider {
  margin: 0 var(--m-m-container);
  cursor: none;

  &:hover {
    :deep(.pull__cursor) {
      opacity: 1;
    }
  }

  :deep( .cases-item ) {
    cursor: none;
  }
}

.cases-slider__block-header {
  margin-bottom: 6rem;
}

.cases-slider__swiper {
  padding-left: var(--p-container);
  padding-right: var(--p-container);

  & .swiper-slide {
    width: 68rem;

    &:nth-child(2n + 2) {
      max-width: 52rem;

      :deep(.cases-item__media-pic) {
        --image-height: 30.5rem;
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