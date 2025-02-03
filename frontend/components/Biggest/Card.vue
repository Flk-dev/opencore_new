<template>
  <div class="biggest-item">
    <div class="biggest-item__top">
      <div class="biggest-item__logo" v-if="logo">
        <img :src="logo" :alt="title">
      </div>
      <h4 class="biggest-item__title fz-h2--mobile">{{ title }}</h4>
      <div class="biggest-item__subtitle fz-caption" v-if="subtitle" v-html="subtitle"></div>
    </div>
    <div class="biggest-item__text" v-if="text" v-html="text"></div>
  </div>
</template>

<script setup lang="ts">
defineProps<{
  logo?: string,
  title?: string,
  subtitle?: string,
  text?: string,
}>();
</script>

<style scoped lang="scss">
.biggest-item {
  padding: 3rem;
  border-radius: var(--br-regular);
  border: 1.5px solid var(--fg-blue);
  min-height: 36.9rem;
  display: flex;
  flex-direction: column;
  justify-content: space-between;

  &__logo {
    margin-bottom: 3rem;

    & img {
      max-height: 6rem;
    }
  }

  &__subtitle {
    margin-top: 1rem;
    max-width: 50.4rem;
  }

  &__text {
    font-size: 1.4rem;
    line-height: 110%;
    color: var(--fg-black-75);
    max-width: 24.9rem;

    :deep(a) {
      color: var(--fg-black-75);
      text-decoration: underline;
    }
  }

  @media (max-width: $mobile) {
    padding: 2rem;
  }
}
</style>