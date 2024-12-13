<template>
  <h1 class="page__title fz-h2">{{ title }}</h1>
</template>

<script setup>
import { defineProps } from "vue";

const { title } = defineProps( {
  title: String,
} );

</script>

<style scoped lang="scss">

</style>