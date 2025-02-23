<template>
  <div class="services__filter" v-if="categories.length">
    <div class="services__filter-title fz-h4 fz-h2--mobile animate" v-animate>
      <span class="_up">Какой тип брендинга вас интересует?</span>
    </div>
    <GlobalFilterCategories class="services__filter-list" :data="categories" :hide-all="true" />
  </div>
</template>

<script setup lang="ts">
defineProps<{
  categories: object
}>();
</script>

<style scoped lang="scss">
.services__filter {
  margin-bottom: 6rem;

  @media (max-width: $mobile) {
    margin-top: 4rem;
  }

  &-list {
    margin-top: 3rem;

    @media (max-width: $mobile) {
      margin-top: 2rem;
    }

    & :deep(.container) {
      max-width: 100%;
      padding: 0;
    }
  }
}
</style>