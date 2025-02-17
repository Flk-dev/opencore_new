<template>
  <GlobalFilterCategories class="blog__filter" :style="{top: (!isHide ? (headerHeight - 2) : 0) + 'px'}" :data="categories" />
</template>

<script setup lang="ts">
import { useHeader } from "~/stores/header";

const { result: categories } = await useApi( '/blog/categories', {}, 'blog/categories' );

const store = useHeader();
const isHide = computed(() => store.isHide);
const headerHeight = computed(() => store.headerHeight);
</script>

<style scoped lang="scss">
.blog__filter {
  position: sticky;
  top: 0;
  z-index: 50;
  background: var(--fg-white);
  padding: 1rem 0;
  transition: all .3s;

  @media (max-width: $tablet) {
    top: 7.4rem;
  }

  @media (max-width: $tablet) {
    top: 6.8rem;
  }
}
</style>