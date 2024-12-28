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
  logo?: string
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

  @media (max-width: $mobile) {
    min-height: 44rem;
  }
}

.reviews-item__title {
  color: var(--fg-blue);
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
  margin-top: 1.5rem;

  @media (max-width: $mobile) {
    font-size: 1.2rem;
    line-height: 110%;

    & br {
      display: none;
    }
  }
}

</style>