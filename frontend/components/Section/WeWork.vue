<template>
  <section class="we-work section" v-if="weWork.list">
    <div class="we-work__container container">
      <GlobalBlockHeader :title="title" classes="we-work" class-title="fz-h1--tablet">
        <div class="block-header__text fz-caption" v-if="text" v-html="text"></div>
        <div class="block-header__logo" v-if="logo">
          <img :src="logo" alt="">
        </div>
      </GlobalBlockHeader>
      <div class="we-work__rows">
        <Vue3Marquee
            v-for="(list, listKey) in weWork.list"
            :key="listKey"
            class="we-work__slide"
            :direction="listKey === 1 ? 'reverse' : 'normal'"
            duration="40"
            clone="true">
          <div class="we-work__item" v-for="(cell, cellKey) in list.leader_cell" :key="cellKey">
            <img :src="cell.logo" class="we-work__item-img" alt="">
          </div>
        </Vue3Marquee>
      </div>
      <template v-if="withList && weWork.data">
        <button class="we-work__open" :class="{ '_active' : isActive }" @click="toggleList">
          <span>{{ isActive ? 'скрыть список клиентов' : 'посмотреть список клиентов' }}</span>
          <svg width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M11.5652 14.4806L1 14.4806V13.9106L11.5652 13.9106C12.9099 13.9106 14 12.8205 14 11.4758V1L14.5968 1V11.4758C14.5968 12.8205 15.6869 13.9106 17.0315 13.9106L27.5 13.9106V14.4806L17.0315 14.4806C15.6868 14.4806 14.5968 15.5707 14.5968 16.9154L14.5968 27.5L14 27.5L14 16.9154C14 15.5707 12.9099 14.4806 11.5652 14.4806Z" fill="#0000FF" stroke="#0000FF"/>
          </svg>
        </button>
        <div class="we-work__list" :class="{ '_active' : isActive }">
          <div class="we-work__list-col" v-for="( item, key ) in weWork.data" :key="key">
            <div class="we-work__list-cat fz-caption">{{ item.name }}</div>
            <div class="we-work__list-row">
              <div class="we-work__list-item" v-for="post in item.posts" :key="post.post_id">{{ post.post_title }}</div>
            </div>
          </div>
        </div>
      </template>
      <UIButton v-else title="Наш подход" to="/methodology/" class="we-work__btn btn--ripple" />
    </div>
  </section>
</template>

<script setup lang="ts">
defineProps<{
  title: string,
  text?: string,
  logo?: string,
  is_button: boolean,
  withList?: boolean,
}>();

const weWork :object  = useState('weWork');
const config = useRuntimeConfig();

await callOnce(async () => {
  weWork.value = await $fetch(`${ config.public.WP_DEV }/we-work`);
});

const isActive = ref( false );
const toggleList = () => {
  isActive.value = !isActive.value;
}
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

  & :deep(.block-header__content) {
    @media (max-width: $tablet) {
      margin-top: 2.5rem;
    }
  }

  & :deep(.block-header__text) {
    max-width: 33.3rem;
    color: var(--fg-black-75);
    opacity: .75;

    @media (max-width: $tablet) {
      margin-top: 0;
      order: 2;
      margin-left: 2.8rem;
    }
  }

  & :deep(.block-header__logo) {
    margin-top: 2rem;

    @media (max-width: $tablet) {
      margin-top: 0;
      order: 1;
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

.we-work__rows {
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
  --width: 26rem;
  margin-right: 10rem;
  min-width: var(--width);
  max-width: var(--width);

  & img {
    width: 100%;
    height: auto;
  }

  @media (max-width: $tablet) {
    margin-right: 8rem;
  }
}

.we-work__open {
  display: flex;
  align-items: center;
  color: var(--fg-blue);
  font-size: var(--fz-button);
  margin-top: 10rem;

  & span {
    border-bottom: 1.5px solid var(--fg-blue);
  }

  & svg {
    margin-left: 1.5rem;
    margin-top: .8rem;

    transition: var(--tr-regular);

    @media (max-width: $tablet) {
      margin-top: 0;
    }
  }

  &._active {
    & svg {
      transform: rotate(45deg);
    }
  }


  @media (max-width: $tablet) {
    margin: 8rem auto 0;
  }
}

.we-work__list {
  display: grid;
  grid-template-columns: 0fr;
  row-gap: 6rem;
  column-gap: 5rem;
  height: 0;
  opacity: 0;
  visibility: hidden;
  transition: all .3s;

  &._active {
    height: auto;
    opacity: 1;
    visibility: visible;
    grid-template-columns: repeat(5, 1fr);
    margin-top: 8rem;

    @media (max-width: $tablet) {
      grid-template-columns: repeat(2, 1fr);
    }

    @media (max-width: $mobile) {
      grid-template-columns: 1fr;
      margin-top: 6rem;
    }
  }

  @media (max-width: $tablet) {
    column-gap: 6rem;
    row-gap: 6rem;
  }

  @media (max-width: $mobile) {
    row-gap: 4rem;
  }
}

.we-work__list-cat {
  color: var(--fg-blue);
  margin-bottom: 3rem;

  @media (max-width: $mobile) {
    margin-bottom: 1.5rem;
  }
}

.we-work__list-item {
  font-size: var(--fz-button);
  line-height: var(--lh-button);
  margin-bottom: 1.5rem;

  &:last-child {
    margin-bottom: 0;
  }
}
</style>