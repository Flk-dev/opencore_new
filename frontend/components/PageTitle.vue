<template>
  <h1 class="page__title fz-h2" :class="classes" v-html="title"></h1>
</template>

<script setup lang="ts">
defineProps<{
  title: string,
  classes?: string
}>();

</script>

<style scoped lang="scss">

</style>