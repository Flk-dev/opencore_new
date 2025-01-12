<template>
  <div class="career__expertise career-expertise">
    <div class="career-expertise__container container">
      <GlobalBlockHeader :title="data.title" classes="career-expertise" class-title="fz-h1--tablet"/>
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

.career-expertise__block-header {
  @media (max-width: $mobile) {
    margin-bottom: 3rem;
  }
}
</style>