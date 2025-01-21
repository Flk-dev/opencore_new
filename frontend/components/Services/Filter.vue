<template>
  <div class="services__filter" v-if="categories.length">
    <div class="services__filter-title fz-h4">Какой тип брендинга вас интересует?</div>
    <GlobalFilterCategories class="services__filter-list" :data="categories" hide-all="true" />
  </div>
</template>

<script setup lang="ts">
defineProps<{
  categories?: object
}>();
</script>

<style scoped lang="scss">
.services__filter {
  margin-bottom: 6rem;

  &-list {
    margin-top: 3rem;

    & :deep(.container) {
      max-width: 100%;
      padding: 0;
    }
  }
}
</style>