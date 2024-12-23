<template>
  <SectionsCases class="service__projects" :data="data" />
</template>

<script setup lang="ts">
defineProps<{
  data: object
}>();
</script>

<style scoped lang="scss">
.service__projects {
  padding: 0;
  margin-top: var(--mt-content-block);
}
</style>