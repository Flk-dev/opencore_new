<template>
  <section class="festival section" v-if="festival.list.length">
    <div class="festival__container container">
      <GlobalBlockHeader :title="festival.title" classes="festival" class-title="fz-h1--tablet">
        <img v-if="festival.logo" :src="festival.logo" alt="">
      </GlobalBlockHeader>

      <div class="festival__list">
        <NuxtMarquee
            v-for="(list, listKey) in festival.list"
            :key="listKey"
            class="festival__row"
            :direction="listKey === 1 ? 'right' : 'left'"
            :speed="listKey === 1 ? 75 : 90"
            clone="true"
            :pause-on-hover="true"
        >
          <div class="festival__item" v-for="(item, cellKey) in list.awards_cell" :key="cellKey">
              <div class="festival__title fz-h3" v-if="item.text" v-html="item.text"></div>
              <div class="festival__label fz-caption" v-if="item.prize" v-html="item.prize"></div>
          </div>
        </NuxtMarquee>
      </div>
    </div>
  </section>
</template>

<script setup lang="ts">
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

  :deep(.block-header__title) {
    max-width: 110rem;
  }

  :deep(.block-header__content) {
    & img {
      max-width: 20.2rem;
    }
  }

  @media (max-width: $tablet) {
    :deep(.block-header__content) {
      margin-top: 4rem;
    }
  }

  @media (max-width: $mobile) {
    & .block-header__content img {
      max-width: 15rem;
    }
  }
}

.festival__row {
  margin-bottom: 5rem;
  overflow-y: hidden;
  padding-bottom: .5rem;

  &:last-child {
    margin-bottom: 0;
  }
  
  @media (max-width: $tablet) {
    margin-bottom: 4.5rem;
  }

  @media (max-width: $mobile) {
    margin-bottom: 2.5rem;
  }
}

.festival__list {
  margin: 0 var(--m-m-container);
}

.festival__item {
  display: flex;
  align-items: center;
  white-space: nowrap;
  max-width: fit-content;
  margin-right: 6rem;
}

.festival__slider .swiper-slide {
  max-width: fit-content;
  min-width: fit-content;
}

.festival__title {
  line-height: 100%;

  :deep(br) {
    display: none;

    @media (max-width: $mobile) {
      display: block;
    }
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
</style>