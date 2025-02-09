<template>
  <div
      class="reviews-item"
      @click="! cases && modal.open( ModalsReview, {
        isWhite: true,
        title: title,
        full: full,
        logo: logo,
        name: name,
        post: post,
        width: 680,
        isBlueTitle: true
      } )"
  >
    <div class="reviews-item__title fz-h3 fz-h2--mobile" v-html="title"></div>
    <div class="reviews-item__content">
      <div class="reviews-item__text" v-if="text" v-html="text"></div>
      <div class="reviews-item__client">
        <NuxtLink
            v-if="cases"
            :to="{name: 'cases-slug', params: {slug: cases.post_name}}"
            class="reviews-item__client-logo _link"
            ref="refLogo"
            @mouseenter="setCursor( 'enter' )"
            @mouseleave="setCursor( 'leave' )"
        >
          <img v-if="logo" :src="logo">
        </NuxtLink>
        <div
            v-else class="reviews-item__client-logo"
            ref="refLogo"
        >
          <img v-if="logo" :src="logo">
        </div>
        <div class="reviews-item__client-content" v-if="name || post">
          <div class="reviews-item__client-name" v-if="name">{{ name }}</div>
          <div class="reviews-item__client-post fz-caption" v-if="post" v-html="post"></div>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
import {ModalsReview} from "#components";

defineProps<{
  title: string,
  text?: string,
  name?: string,
  post?: string,
  logo?: string,
  cases?: object,
  full?: string
}>();

const modal = useModal();

const setCursor = ( action: string ) => {
  if ( action === 'enter' ) {
    document.querySelector('.reviews__cursor').classList.add('reviews__cursor--active');
  } else {
    document.querySelector('.reviews__cursor').classList.remove('reviews__cursor--active');
  }
}
</script>

<style scoped lang="scss">
.reviews__cursor {
  position: absolute;
  transform: translate(-50%, -50%);
  background: var(--fg-blue);
  color: var(--fg-white);
  height: 3.1rem;
  display: flex;
  align-items: center;
  justify-content: center;
  padding: 0 1rem;
  border-radius: 1rem;
  opacity: 1;
  z-index: 5;
  transition: opacity .3s;
}

.reviews-item {
  position: relative;
  cursor: pointer;
  padding: 3rem;
  border: 1.5px solid var(--fg-blue);
  border-radius: var(--br-regular);
  display: flex;
  flex-direction: column;
  justify-content: space-between;
  min-height: 55.5rem;
  height: 100%;

  @media (max-width: $mobile) {
    min-height: 44rem;
  }

  &__title {
    color: var(--fg-blue);
  }

  &__content {
    min-height: 37.8rem;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    margin-top: 3rem;

    @media (max-width: $mobile) {
      min-height: 31.3rem;
    }
  }

  &__client {
    display: flex;
    align-items: center;
    position: relative;

    &-logo {
      min-width: 8.8rem;
      margin-right: 1.5rem;
      position: relative;

      &._link:hover {
        cursor: none;
      }

      & img {
        border-radius: var(--br-regular);
        width: 100%;
        height: auto;
      }

      @media (max-width: $mobile) {
        min-width: 6rem;
        max-width: 6rem;
      }
    }

    &-name {
      color: var(--fg-black);
    }

    &-post {
      color: var(--fg-gray-2);
      margin-top: 1rem;

      @media (max-width: $mobile) {
        font-size: 1.2rem;
        line-height: 110%;
        margin-top: .5rem;

        & br {
          display: none;
        }
      }
    }
  }

  &__case {
    position: fixed;
    transform: translate(-50%, -50%);
    background: var(--fg-blue);
    color: var(--fg-white);
    height: 3.1rem;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 0 1rem;
    border-radius: 1rem;
    opacity: 1;
    z-index: 5;
    transition: opacity .3s;
  }
}
</style>