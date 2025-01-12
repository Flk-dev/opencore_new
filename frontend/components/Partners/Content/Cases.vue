<template>
  <SectionCases class="partner__cases" :title="data.title" :data="data.select">
    <UIButton class="partner__cases-btn btn--ripple" title="Все проекты" to="/cases/" />
  </SectionCases>
</template>

<script setup lang="ts">
defineProps<{
  data: {
    title?: string,
    list: object
  }
}>();
</script>

<style scoped lang="scss">
.partner__cases {
  margin-top: var(--mt-content-block);
  padding: 0;
}

.partner__cases {
  :deep(.cases__block-header) {
    max-width: 110rem;
  }
}

.partner__cases {
  :deep(.cases__col) {
    padding-bottom: 5.5rem;

    @media (max-width: $tablet) {
      padding-bottom: 0;
    }
  }
}
</style>