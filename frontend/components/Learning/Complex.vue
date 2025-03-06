<template>
  <div class="learning__complex learning-complex">
    <div class="learning__container container">
      <div class="learning-complex__pin">
        <GlobalBlockHeader :title="data.title" classes="learning-complex" class-title="fz-h1--tablet"/>
        <div class="learning-complex__text fz-h4" v-if="data.text" v-html="data.text"></div>
        <div class="learning-complex__slider">
          <div class="learning-complex__item" v-for="(item, index) in data.list" :key="index" ref="items">
            <div class="learning-complex__item-card">
              <div>
                <div class="learning-complex__item-number">{{ ( index + 1 ) }}</div>
                <h4 class="learning-complex__item-title fz-h4 fz-h2--mobile" v-html="item.title"></h4>
              </div>
              <div class="learning-complex__item-text content__text" v-html="item.text"></div>
            </div>
          </div>
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
  </div>
</template>

<script setup lang="ts">
import { Swiper, SwiperSlide } from 'swiper/vue';
import 'swiper/css';
import {ModalsLearningFree} from "#components";

import { gsap } from "gsap";
import { ScrollTrigger } from "gsap/ScrollTrigger";

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

const { width: windowWidth } = useWindowSize();
const items: Ref = ref( null );
const firstItemWidth: Ref = ref( 0 );

let tl;

onMounted( () => {
  firstItemWidth.value = items.value[0].getBoundingClientRect().width;

  tl = gsap.timeline({
    scrollTrigger: {
      trigger: '.learning-complex',
      pin: '.learning-complex__pin',
      start: `center center`,
      end: `${( firstItemWidth.value ) * 4} bottom`,
      scrub: true,
      markers: false,
    }
  });

  tl.to('.learning-complex__slider', {
    x: () => -1 * ((firstItemWidth.value * items.value.length) - windowWidth.value),
  });
} );
</script>

<style scoped lang="scss">
.learning-complex {
  overflow: hidden;
  position: relative;

  &__block-header {
    margin-bottom: 3rem;
    max-width: 64.4rem;

    @media (max-width: $mobile) {
      margin-bottom: 0;
    }
  }

  &__text {
    max-width: 50.9rem;
    margin-bottom: 10rem;

    @media (max-width: $mobile) {
      margin-bottom: 6rem;
    }
  }

  &__slider {
    //margin-right: var(--m-m-container);
    //margin-left: var(--m-m-container);
    //padding: 0 var(--p-container);
    display: flex;
    align-items: flex-start;
    flex-wrap: nowrap;
  }

  &__btn {
    margin-top: 10rem;

    @media (max-width: $mobile) {
      margin-top: 6rem;
    }
  }
}

.learning-complex__item {
  padding: 0 4rem;
  position: relative;
  min-width: 53rem;

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

  &-number {
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

  &-card {
    min-height: 42.3rem;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
  }

  &-text {
    --fz: 1.8rem;
    --lh: 120%;

    --mb-ul-li: 1.5rem;
    --top-ul-icon: .8rem;

    @media (max-width: $mobile) {
      --fz: 1.5rem;
      --top-ul-icon: .65rem;
    }
  }
}

</style>