<template>
  <SectionsReturn class="methodology__return" :title="data.title" :small-text="data.text_small" :big-text="data.text_big" />
</template>

<script setup lang="ts">
defineProps<{
  data: {
    title: string,
    text_small?: string,
    text_big?: string
  }
}>();
</script>

<style scoped>
.methodology__return {
  margin-top: var(--mt-content-block);
}
</style>