<template>
  <SectionCases class="home__cases" :title="data.title" :data="data.select">
    <UIButton title="Все проекты" class="home__cases-btn btn--ripple" to="cases" />
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
.home__cases {
  ::v-deep & .cases__block-header {
    max-width: 90.9rem;
  }
}
</style>