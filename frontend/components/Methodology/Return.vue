<template>
  <SectionReturn class="return__methodology" :title="data.title" :small-text="data.text_small" :big-text="data.text_big" />
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
.return__methodology {
  margin-top: var(--mt-content-block);
}
</style>