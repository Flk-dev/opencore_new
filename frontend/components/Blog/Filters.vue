<template>
  <GlobalFilterCategories :data="categories" />
</template>

<script setup lang="ts">
const { result: categories, error } = await useApi( '/blog/categories', {}, 'blog/categories' );
</script>

<style scoped lang="scss">

</style>