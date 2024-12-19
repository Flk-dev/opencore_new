<template>
  <div class="history-card">
    <UIImage :image="image" classes_pic="history-card__image item--cover" />
    <h3 class="history-card__title fz-h3">{{ title }}</h3>
    <div class="history-card__subtitle fz-body" v-if="subtitle">{{ subtitle }}</div>
  </div>
</template>

<script setup lang="ts">
defineProps<{
  image?: string,
  title: string,
  subtitle?: string
}>();

</script>

<style scoped lang="scss">
::v-deep .history-card__image {
  height: 55rem;
  border-radius: 1.5rem;
  margin-bottom: 2.5rem;
}

.history-card__subtitle {
  margin-top: 1.5rem;
}

</style>