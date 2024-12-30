<template>
  <div class="services__filter services-filter" v-if="categories.length">
    <div class="services-filter__title fz-h4">Какой тип брендинга вас интересует?</div>
    <GlobalFilterCategories class="services-filter__list" :data="categories" />
  </div>
</template>

<script setup lang="ts">
defineProps<{
  categories?: object
}>();
</script>

<style scoped lang="scss">
.services-filter {
  margin-bottom: 6rem;
}

.services-filter__list {
  margin-top: 3rem;

  & ::v-deep .container {
    max-width: 100%;
    padding: 0;
  }
}
</style>