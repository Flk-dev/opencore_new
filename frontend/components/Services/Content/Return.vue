<template>
  <SectionReturn class="service__return" :title="data.title" :big-text="data.big_text" :small-text="data.big_text" />
</template>

<script setup lang="ts">
defineProps<{
  data: {
    title: string,
    big_text?: string,
    small_text?: string
  }
}>();
</script>

<style scoped lang="scss">
.service__return {
  margin-top: var(--mt-content-block);
}
</style>