<template>
  <section class="speakers section">
    <div class="speakers__container container">
      <GlobalBlockHeader :title="title" classes="speakers" />
      <div class="speakers__slider" @mousemove="changeCursor">
        <UIPullCursor ref="cursor" />
        <swiper
            class="speakers__swiper"
            :slides-per-view="0.9"
            :space-between="30"
            :breakpoints="{ '576': { slidesPerView: 1.5 } }"
            @sliderMove="test"
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

const cursor = ref( null );
const changeCursor = ( event: any ) => {
  const x = event.clientX;
  const y = event.clientY;

  cursor.value.$el.style.left = x + 'px';
  cursor.value.$el.style.top = y + 'px';
}

const test = ( event: any, pos: any ) => {
  const x = pos.clientX;
  const y = pos.clientY;

  cursor.value.$el.style.left = x + 'px';
  cursor.value.$el.style.top = y + 'px';
}
</script>

<style scoped lang="scss">
.speakers__slider {
  margin: 0 var(--m-m-container);
  cursor: none !important;

  &:hover {
    :deep(.pull__cursor) {
      opacity: 1;
    }
  }
}

.speakers__swiper {
  padding: 0 var(--p-container);
}

.speakers__block-header {
  margin-bottom: 4rem !important;
}

</style>