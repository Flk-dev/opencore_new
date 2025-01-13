<template>
  <section class="we-work section" v-if="weWork.list.length">
    <div class="we-work__container container">
      <GlobalBlockHeader :title="title" classes="we-work">
        <div class="block-header__text fz-caption" v-if="text" v-html="text"></div>
        <div class="block-header__logo" v-if="logo">
          <img :src="logo" alt="">
        </div>
      </GlobalBlockHeader>
      <div class="we-work__list">
        <Vue3Marquee
            v-for="(list, listKey) in weWork.list"
            :key="listKey"
            class="we-work__slide"
            :direction="listKey === 1 ? 'reverse' : 'normal'"
            duration="30">
          <div class="we-work__item" v-for="(cell, cellKey) in list.leader_cell" :key="cellKey">
            <img :src="cell.logo" class="we-work__item-img" alt="">
          </div>
        </Vue3Marquee>
      </div>
      <UIButton title="Наш подход" to="/methodology/" class="we-work__btn btn--ripple" />
    </div>
  </section>
</template>

<script setup lang="ts">
import { Swiper, SwiperSlide } from 'swiper/vue';
import 'swiper/css';

defineProps<{
  title: string,
  text?: string,
  logo?: string,
  is_button: boolean
}>();

const weWork :object  = useState('weWork');
const config = useRuntimeConfig();

await callOnce(async () => {
  weWork.value = await $fetch(`${ config.public.WP_DEV }/we-work`);
});
</script>

<style scoped lang="scss">
.we-work {
  padding-bottom: 20rem;
  overflow: hidden;

  @media (max-width: $tablet) {
    padding-bottom: 18rem;
  }

  @media (max-width: $mobile) {
    padding-bottom: 12rem;
  }
}

.we-work__block-header {
  & :deep(.block-header__title) {
    max-width: 88.1rem;
  }

  & :deep(.block-header__text) {
    max-width: 33.3rem;
    color: var(--fg-black-75);
    opacity: .75;
  }

  & :deep(.block-header__logo) {
    margin-top: 2rem;
  }
}

.we-work__block-header__text {
  color: var(--fg-black-75);
  margin-bottom: 1rem;
}

.we-work__btn {
  margin-top: 11.4rem;

  @media (max-width: $tablet) {
    margin-top: 10rem;
  }

  @media (max-width: $mobile) {
    margin-top: 6rem;
  }
}

.we-work__list {
  margin-left: var(--m-m-container);
  margin-right: var(--m-m-container);
}

.we-work__slide {
  display: flex;
  flex-wrap: nowrap;
  margin-bottom: 2rem;

  &:last-child {
    margin-bottom: 0;
  }
}

.we-work__item {
  margin-right: 10rem;
  min-width: 26rem;

  @media (max-width: $tablet) {
    margin-right: 8rem;
  }
}
</style>