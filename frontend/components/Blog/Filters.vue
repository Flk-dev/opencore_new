<template>
  <GlobalFilterCategories class="blog__filter" :data="categories" />
</template>

<script setup lang="ts">
const { result: categories } = await useApi( '/blog/categories', {}, 'blog/categories' );
</script>

<style scoped lang="scss">
.blog__filter {
  position: sticky;
  top: 4.5rem;
  z-index: 50;
  background: var(--fg-white);
  padding: 1rem 0;
}
</style>