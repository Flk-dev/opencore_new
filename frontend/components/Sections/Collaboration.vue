<template>
  <section class="collaborate section" v-if="collaborate.data.list.length">
    <div class="collaborate__container container">
      <BlockHeader title="Уже сотрудничаем<br> с классными ребятами" classes="collaborate" />
      <div class="collaborate__slider">
        <swiper
            class="collaborate__swiper"
            :slides-per-view="5"
            :space-between="22"
            :loop="true"
        >
          <swiper-slide v-for="collaborate in collaborate.data.list">
            <div class="collaborate__item">
              <img :src="collaborate" alt="">
            </div>
          </swiper-slide>
        </swiper>
      </div>
    </div>
  </section>
</template>

<script setup >
import { Swiper, SwiperSlide } from 'swiper/vue';
import 'swiper/css';

const { result: collaborate } = await useApi( '/template/partners/collaborate', {}, 'partners/collaborate' );

</script>

<style scoped lang="scss">
.collaborate__slider {
  margin-right: var(--m-m-container);
}
</style>