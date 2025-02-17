<template>
  <GlobalFilterCategories class="cases__filter" :style="{top: (!isHide ? (headerHeight - 2) : 0) + 'px'}" :data="categories" />
</template>

<script setup lang="ts">
import { useHeader } from "~/stores/header";

const { result: categories } = await useApi( '/cases/categories', {}, 'cases/categories' );

const store = useHeader();
const isHide = computed(() => store.isHide);
const headerHeight = computed(() => store.headerHeight);
</script>

<style scoped lang="scss">

</style>