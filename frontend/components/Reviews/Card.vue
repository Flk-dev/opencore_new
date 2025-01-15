<template>
  <div
      class="reviews-item"
      @click="modal.open( ModalsReview, {
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
    <h3 class="reviews-item__title fz-h3 fz-h2--mobile" v-if="title" v-html="title"></h3>
    <div class="reviews-item__flex" v-if="logo || name">
      <div class="reviews-item__logo" v-if="logo">
        <img :src="logo" :alt="title">
      </div>
      <div class="reviews-item__info">
        <div class="reviews-item__name fz-body" v-if="name">{{ name }}</div>
        <div class="reviews-item__post fz-caption" v-if="post">{{ post }}</div>
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
import {ModalsReview} from "#components";

defineProps<{
  id: string,
  name: string,
  title?: string,
  post?: string,
  logo?: string,
  full?: string,
}>();

const modal = useModal();
</script>

<style scoped lang="scss">
.reviews-item {
  cursor: pointer;
  padding: 3rem;
  border-radius: var(--br-regular);
  border: .15rem solid var(--fg-blue);
  margin-bottom: 2rem;

  &:last-child {
    margin-bottom: 0;
  }
}

.reviews-item__title {
  color: var(--fg-blue);
}

.reviews-item__flex {
  margin-top: 4rem;
  display: flex;
  align-items: center;
}

.reviews-item__logo {
  min-width: 8.8rem;
  margin-right: 1.5rem;

  @media (max-width: $mobile) {
    min-width: 6.6rem;
    max-width: 6.6rem;
  }
}

.reviews-item__logo img {
  border-radius: var(--br-regular);
}

.reviews-item__name {
  @media (max-width: $mobile) {
    font-size: 1.6rem;
  }
}

.reviews-item__post {
  margin-top: 1rem;
  color: var(--fg-a1);
}

</style>