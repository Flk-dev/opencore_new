<template>
  <div class="learning__complex learning-complex">
    <BlockHeader :title="data.title" classes="learning-video"/>
    <div class="learning-complex__text fz-h4" v-if="data.text" v-html="data.text"></div>
    <swiper
        class="learning-complex__swiper"
        :slides-per-view="2.6"
        :loop="true"
    >
      <swiper-slide v-for="(item, index) in data.list" :key="index">
        <div class="learning-complex__item">
          <div class="learning-complex__item-card">
            <div>
              <div class="learning-complex__item-number">{{ ( index + 1 ) }}</div>
              <h4 class="learning-complex__item-title fz-h4" v-html="item.title"></h4>
            </div>
            <div class="learning-complex__item-text content__text" v-html="item.text"></div>
          </div>
        </div>
      </swiper-slide>
    </swiper>

    <UIButton title="Получить бесплатную консультацию" classes="learning-complex__btn" />
  </div>
</template>

<script setup lang="ts">
import { Swiper, SwiperSlide } from 'swiper/vue';
import 'swiper/css';

defineProps<{
  data: {
    title: string,
    text: string,
    list: object
  }
}>();
</script>

<style scoped lang="scss">
.learning-video__block-header {
  margin-bottom: 3rem;
  max-width: 64.4rem;
}

.learning-complex__text {
  max-width: 50.9rem;
  margin-bottom: 10rem;
}

.learning-complex__item {
  padding: 0 4rem;
  position: relative;

  &:after {
    content: '';
    position: absolute;
    right: -.5rem;
    top: 0;
    height: 100%;
    width: .1rem;
    background: var(--fg-black);
  }
}

.learning-complex__item-number {
  font-family: var(--ff-extended);
  font-size: 7rem;
  letter-spacing: -.2rem;
  line-height: 100%;
  color: var(--fg-blue);
  margin-bottom: 1.5rem;
}

.learning-complex__item-card {
  min-height: 42.3rem;
  display: flex;
  flex-direction: column;
  justify-content: space-between;
}

.learning-complex__item-text {
  --fz: 1.8rem;
  --lh: 120%;

  --mb-ul-li: 1.5rem;
}

.learning-complex__swiper {
  margin-right: var(--m-m-container);
}

.learning-complex__btn {
  margin-top: 10rem;
}

</style>