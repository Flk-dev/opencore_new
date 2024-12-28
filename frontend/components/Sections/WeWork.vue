<template>
  <section class="we-work section" v-if="weWork.list.length">
    <div class="we-work__container container">
      <BlockHeader :title="title" classes="we-work">

      </BlockHeader>
      <div class="we-work__grid" v-for="(list, listKey) in weWork.list" :key="listKey">
        <div class="we-work__slide">
          <div class="we-work__item" v-for="(cell, cellKey) in list.leader_cell" :key="cellKey">
            <img :src="cell.logo" class="we-work__item-img" alt="">
          </div>
        </div>
      </div>
      <NuxtLink to="#" class="we-work__btn btn btn--ripple">
        <span>Наш подход</span>
      </NuxtLink>
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

const weWork = useState('weWork');
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
  & .block-header__right {
    max-width: 33.3rem;
  }

  @media (max-width: $tablet) {
    & .block-header__right {
      max-width: 45rem;
    }

    & .block-header__title {
      font-size: 4rem;
      margin-bottom: 2rem;
    }

    .block-header__right {
      display: flex;
      align-items: center;

      & .we-work__block-header__text {
        order: 2;
        padding-left: 2.8rem;
        font-size: var(--fz-caption);
        letter-spacing: var(--lc-caption);
        line-height: var(--lh-caption);
      }

      & .we-work__block-header__pic {
        min-width: 9.7rem;
        order: 1;
      }
    }
  }

  @media (max-width: $mobile) {
    & .block-header__title {
      font-size: 2.4rem;
      line-height: 100%;
      margin-bottom: 2rem;

      & br {
        display: none;
      }
    }
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

</style>