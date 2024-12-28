<template>
  <section class="festival section" v-if="festival.list.length">
    <div class="festival__container container">
      <BlockHeader :title="festival.title" classes="festival">
        <img v-if="festival.logo" :src="festival.logo" alt="">
      </BlockHeader>

      <div class="festival__slider" v-for="(row, rowKey) in festival.list" :key="rowKey">
        <swiper
            class="festival__swiper"
            :loop="true"
            :free-mode="true"
            :space-between="60"
            :grab-cursor="true"
            :slides-per-view="'auto'"
            :autoplay="{ delay: 1, disableOnInteraction: true }"
            :speed="10000"
            :free-mode-momentum="10000"
        >
          <swiper-slide v-for="(item, key) in row.awards_cell">
            <div class="festival__item">
              <div class="festival__title fz-h3" v-if="item.text" v-html="item.text"></div>
              <div class="festival__label fz-caption" v-if="item.prize" v-html="item.prize"></div>
            </div>
          </swiper-slide>
        </swiper>
      </div>
    </div>
  </section>
</template>

<script setup lang="ts">
import { Swiper, SwiperSlide } from 'swiper/vue';
import 'swiper/css';

const festival = useState('festival');
const config = useRuntimeConfig();

await callOnce(async () => {
  festival.value = await $fetch(`${ config.public.WP_DEV }/festival`);
});

</script>

<style scoped lang="scss">
.festival__block-header {
  align-items: flex-start;
  margin-bottom: 11.8rem;
}
</style>