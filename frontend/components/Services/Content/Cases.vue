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
}
</style>