<template>
  <div class="services__filter" v-if="categories.length">
    <div class="services__filter-title fz-h4 fz-h2--mobile animate animate__fadeIn" v-animate>
      <span class="_up">Какой тип брендинга вас интересует?</span>
    </div>
    <GlobalFilterCategories class="services__filter-list" :data="categories" :hide-all="true" @filter="filter" :is-active-index="isActiveIndex" />
  </div>
</template>

<script setup lang="ts">
defineProps<{
  categories: object,
  isActiveIndex?: number
}>();

const emit = defineEmits( [ 'serviceFilter' ] );
const filter = ( term_id: number ) => {
  emit( 'serviceFilter', term_id );
}
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