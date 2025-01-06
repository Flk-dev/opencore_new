<template>
  <div class="block-header" :class="classes + '__block-header'">
    <h2 class="block-header__title fz-h2 fz-h1--mobile" :class="classTitle" v-html="title"></h2>
    <div class="block-header__content">
      <div class="block-header__text fz-caption" v-if="text" v-html="text"></div>
      <slot />
    </div>
  </div>
</template>

<script setup lang="ts">
defineProps<{
  title?: string,
  classes?: string,
  text?: string,
  classTitle?: string,
}>();
</script>

<style scoped lang="scss">
.block-header {
  display: flex;
  align-items: center;
  justify-content: space-between;
  margin-bottom: 8rem;

  @media (max-width: $tablet) {
    flex-direction: column;
    align-items: flex-start;
    margin-bottom: 6rem;
  }
}

.block-header__title {
  @media (max-width: $tablet) {
    ::v-deep & br {
      display: none;
    }
  }
}
</style>