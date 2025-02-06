<template>
  <SectionCases class="service__projects" :title="data.title" :data="data.select">
    <UIButton title="Все проекты" to="/cases/" class="service__projects-btn btn--ripple" />
  </SectionCases>
</template>

<script setup lang="ts">
defineProps<{
  data: {
    title: string,
    select: object
  }
}>();
</script>

<style scoped lang="scss">
.service__projects {
  padding: 0;
  margin-top: var(--mt-content-block);

  :deep(.block-header){
    margin-bottom: 6rem;

    @media (max-width: $mobile) {
      margin-bottom: 4rem;
    }
  }

  &-btn {
    @media (max-width: $mobile) {
      display: none;
    }
  }
}
</style>