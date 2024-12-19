<template>
  <div class="career__expertise career-expertise">
    <div class="career-expertise__container container">
      <BlockHeader :title="data.title" classes="career-expertise"/>
      <ScrollLineText :data="data.row" classes="partner-themes" />
    </div>
  </div>
</template>

<script setup lang="ts">
defineProps<{
  data: {
    title?: string,
    row: object
  }
}>();
</script>

<style scoped lang="scss">
.career__expertise {
  margin-top: var(--mt-content-block);
}
</style>