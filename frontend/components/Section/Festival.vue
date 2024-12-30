<template>
  <section class="festival section" v-if="festival.list.length">
    <div class="festival__container container">
      <GlobalBlockHeader :title="festival.title" classes="festival">
        <img v-if="festival.logo" :src="festival.logo" alt="">
      </GlobalBlockHeader>

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
.festival {
  position: relative;
  overflow: hidden;
}

.festival__block-header {
  align-items: flex-start;

  & ::v-deep .block-header__title {
    max-width: 110rem;
  }

  @media (max-width: $mobile) {
    & .block-header__content img {
      max-width: 15rem;
    }
  }
}

.festival__item {
  display: flex;
  align-items: center;
  white-space: nowrap;
  max-width: fit-content;
}

.festival__slider .swiper-slide {
  max-width: fit-content;
  min-width: fit-content;
}

.festival__title {
  line-height: 100%;

  & br {
    display: none;
  }

  @media (max-width: $mobile) {
    font-size: 1.8rem;

    & br {
      display: block;
    }
  }
}

.festival__label {
  color: var(--fg-blue);
  margin-left: 2rem;
  margin-top: .5rem;

  @media (max-width: $mobile) {
    font-size: 1.2rem;
  }
}

.festival__slider .swiper-wrapper {
  -webkit-transition-timing-function:linear!important;
  -o-transition-timing-function:linear!important;
  transition-timing-function:linear!important;
}

.festival__slider {
  margin: var(--m-m-container);
  margin-bottom: 6rem;

  &._back {
    direction: rtl;

    & .festival__title {
      order: 2;
      text-align: left;
    }

    & .festival__label {
      order: 1;
    }
  }
}

.festival__slider .swiper {
  padding-bottom: 1rem;
}

.festival__item {
  //margin-right: 6rem;
}

</style>