<template>
  <div class="history-card">
    <UIImage :image="image" classes_pic="history-card__image item--cover" />
    <h3 class="history-card__title fz-h3">{{ title }}</h3>
    <div class="history-card__subtitle fz-body" v-if="subtitle">{{ subtitle }}</div>
    <button class="history-card__button btn--ripple">
      <span>Подробнее</span>
    </button>
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

.history-card__button {
  height: 4.1rem;
  display: flex;
  align-items: center;
  justify-content: center;
  padding: 0 2rem;
  font-size: var(--fz-caption);
  line-height: var(--lh-caption);
  letter-spacing: var(--lc-caption);
  color: var(--fg-blue);
  border: .15rem solid var(--fg-blue);
  border-radius: var(--br-secondary);
  margin-top: 4rem;

  &:hover {
    color: var(--fg-white);
  }
}

</style>