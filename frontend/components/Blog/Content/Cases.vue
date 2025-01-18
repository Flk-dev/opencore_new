<template>
  <SectionCasesSlider class="article__cases" :title="data.title" :data="data.select" />
</template>

<script setup lang="ts">
defineProps<{
  data: {
    title?: string,
    select: object
  }
}>();
</script>

<style scoped lang="scss">
.article__cases {
  margin-top: var(--mt-content-third);

  :deep(.cases-slider__block-header) {
    margin-bottom: 4rem;
  }
}
</style>