<template>
<div class="about__branding about-branding">
  <div class="container">
    <GlobalBlockHeader :title="data.title" classes="about-branding" class-title="fz-h1" />
    <div class="about-branding__list" v-if="data.list">
      <div class="about-branding__item" v-for="(item, index) in data.list" :key="index">
        <div class="about-branding__item-title fz-h3" v-html="item.title"></div>
        <div class="about-branding__item-text" v-html="item.text"></div>
      </div>
    </div>
  </div>
</div>
</template>

<script setup lang="ts">
defineProps<{
  data: {
    title?: string,
    list?: object
  }
}>();
</script>

<style scoped lang="scss">
.about-branding__block-header {
  margin-bottom: var(--mt-content-block-plus);
  max-width: 105.4rem;
}

.about-branding__list {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: 9rem;
}

.about-branding__item {
  padding-top: 3.5rem;
  border-top: .15rem solid var(--fg-black);

  &-title {
    max-width: 34.1rem;
  }

  &-text {
    max-width: 30.1rem;
    margin-top: 2.5rem;
  }
}
</style>