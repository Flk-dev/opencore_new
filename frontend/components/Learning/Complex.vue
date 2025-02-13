<template>
  <div class="learning__complex learning-complex">
    <div class="learning__container container">
      <GlobalBlockHeader :title="data.title" classes="learning-video" class-title="fz-h1--tablet"/>
      <div class="learning-complex__text fz-h4" v-if="data.text" v-html="data.text"></div>
      <div class="learning-complex__slider">
        <swiper
            class="learning-complex__swiper"
            :slides-per-view="1.05"
            :loop="false"
            :breakpoints="{ '576': { slidesPerView: 1.4 }, '992': { slidesPerView: 2.6 } }"
        >
          <swiper-slide v-for="(item, index) in data.list" :key="index">
            <div class="learning-complex__item">
              <div class="learning-complex__item-card">
                <div>
                  <div class="learning-complex__item-number">{{ ( index + 1 ) }}</div>
                  <h4 class="learning-complex__item-title fz-h4 fz-h2--mobile" v-html="item.title"></h4>
                </div>
                <div class="learning-complex__item-text content__text" v-html="item.text"></div>
              </div>
            </div>
          </swiper-slide>
        </swiper>
      </div>

      <UIButton
          title="Получить бесплатную консультацию"
          title-mobile="Бесплатная консультация"
          class="learning-complex__btn"
          @click="modal.open( ModalsLearningFree, {
            title: 'Узнайте, как улучшить бренд уже&nbsp;сегодня!',
            text: 'Оставьте заявку, и наш специалист свяжется с вами, чтобы&nbsp;обсудить ваши задачи. Мы поможем вам понять, какие шаги нужны для создания сильного и уникального бренда.',
          } )"
      />
    </div>
  </div>
</template>

<script setup lang="ts">
import { Swiper, SwiperSlide } from 'swiper/vue';
import 'swiper/css';
import {ModalsLearningFree} from "#components";

interface List {
  title?: string,
  text?: string
}

defineProps<{
  data: {
    title: string,
    text: string,
    list: Array<List>
  }
}>();

const modal = useModal();
</script>

<style scoped lang="scss">
.learning-video__block-header {
  margin-bottom: 3rem;
  max-width: 64.4rem;

  @media (max-width: $mobile) {
    margin-bottom: 0;
  }
}

.learning-complex__text {
  max-width: 50.9rem;
  margin-bottom: 10rem;

  @media (max-width: $mobile) {
    margin-bottom: 6rem;
  }
}

.learning-complex__item {
  padding: 0 4rem;
  position: relative;

  &:before {
    content: '';
    position: absolute;
    left: 0;
    top: 0;
    height: 100%;
    width: 1.5px;
    background: var(--fg-black);
  }

  @media (max-width: $mobile) {
    padding: 0 2rem;
  }
}

.learning-complex__item-number {
  font-family: var(--ff-extended);
  font-size: 7rem;
  letter-spacing: -.2rem;
  line-height: 100%;
  color: var(--fg-blue);
  margin-bottom: 1.5rem;

  @media (max-width: $mobile) {
    font-size: 4rem;
    line-height: 100%;
    margin-bottom: 1.5rem;
  }
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
  --top-ul-icon: .8rem;

  @media (max-width: $mobile) {
    --fz: 1.5rem;
  }
}

.learning-complex__btn {
  margin-top: 10rem;

  @media (max-width: $mobile) {
    margin-top: 6rem;
  }
}

.learning-complex__slider {
  margin-right: var(--m-m-container);
  margin-left: var(--m-m-container);
}

.learning-complex__swiper {
  padding-left: var(--p-container);
  padding-right: var(--p-container);
}

</style>