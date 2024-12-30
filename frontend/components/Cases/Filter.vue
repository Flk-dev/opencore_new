<template>
  <GlobalFilterCategories class="cases__filter" :data="data" />
</template>

<script setup lang="ts">
defineProps<{
  data: object
}>();
</script>

<style scoped lang="scss">
.cases__filter {

}
</style>