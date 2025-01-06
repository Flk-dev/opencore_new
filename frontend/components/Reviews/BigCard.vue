<template>
  <div class="reviews-item">
    <div class="reviews-item__title fz-h3 fz-h2--mobile" v-html="title"></div>
    <div class="reviews-item__content">
      <div class="reviews-item__text" v-if="text" v-html="text"></div>
      <div class="reviews-item__client">
        <img v-if="logo" :src="logo" class="reviews-item__client-logo">
        <div class="reviews-item__client-content" v-if="name || post">
          <div class="reviews-item__client-name" v-if="name">{{ name }}</div>
          <div class="reviews-item__client-post fz-caption" v-if="post" v-html="post"></div>
        </div>
        <NuxtLink v-if="cases" class="reviews-item__case fz-caption" :to="{name: 'cases-slug', params: {slug: cases.post_name}}">
          смотреть кейс
        </NuxtLink>
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
defineProps<{
  title: string,
  text?: string,
  name?: string,
  post?: string,
  logo?: string,
  cases?: object
}>();
</script>

<style scoped lang="scss">
.reviews-item {
  padding: 3rem;
  border: .15rem solid var(--fg-blue);
  border-radius: var(--br-regular);
  display: flex;
  flex-direction: column;
  justify-content: space-between;
  min-height: 55.5rem;
  height: 100%;

  &:hover {
    & .reviews-item__case {
      opacity: 1;
    }
  }

  @media (max-width: $mobile) {
    min-height: 44rem;
  }
}

.reviews-item__title {
  color: var(--fg-blue);
  margin-bottom: 6rem;
}

.reviews-item__content {
  min-height: 37.8rem;
  display: flex;
  flex-direction: column;
  justify-content: space-between;

  @media (max-width: $mobile) {
    min-height: 31.3rem;
  }
}

.reviews-item__client {
  display: flex;
  align-items: center;
  position: relative;
}

.reviews-item__client-logo {
  border-radius: var(--br-regular);
  min-width: 8.8rem;
  margin-right: 1.5rem;

  @media (max-width: $mobile) {
    min-width: 6rem;
  }
}

.reviews-item__client-name {
  color: var(--fg-black);
}

.reviews-item__client-post {
  color: var(--fg-gray-2);
  margin-top: 1rem;

  @media (max-width: $mobile) {
    font-size: 1.2rem;
    line-height: 110%;

    & br {
      display: none;
    }
  }
}

.reviews-item__case {
  position: absolute;
  bottom: .9rem;
  left: 4.7rem;
  background: var(--fg-blue);
  color: var(--fg-white);
  height: 3.1rem;
  display: flex;
  align-items: center;
  justify-content: center;
  padding: 0 1rem;
  border-radius: 1rem;
  opacity: 0;
  z-index: 5;
  transition: var(--tr-regular);
}

</style>