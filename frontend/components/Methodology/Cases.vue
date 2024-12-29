<template>
  <SectionCasesSlider class="methodology__cases" :title="data.title" :data="data.select" />
</template>

<script setup lang="ts">
defineProps<{
  data: {
    title: string,
    select: object
  }
}>();
</script>

<style scoped>
.methodology__cases {
  padding: 0;
  margin-top: 6rem;
}
</style>