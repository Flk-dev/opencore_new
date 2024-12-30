<template>
  <SectionReturn :title="data.title" :big-text="data.big_text" :small-text="data.small_text" />
</template>

<script setup lang="ts">
defineProps<{
  data: {
    title: string,
    big_text: string,
    small_text: string
  }
}>();
</script>

<style scoped>

</style>