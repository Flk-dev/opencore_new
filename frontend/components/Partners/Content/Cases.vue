<template>
  <SectionsCases class="case__projects" :title="data.title" :data="data.select" />
</template>

<script setup lang="ts">
defineProps<{
  data: object
}>();
</script>

<style scoped lang="scss">
.case__projects {
  margin-top: var(--mt-content-block);
}
</style>