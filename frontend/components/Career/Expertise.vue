<template>
  <div class="career__expertise career-expertise">
    <div class="career-expertise__container container">
      <GlobalBlockHeader :title="data.title" classes="career-expertise"/>
      <GlobalScrollText :data="data.row" classes="career-expertise" />
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