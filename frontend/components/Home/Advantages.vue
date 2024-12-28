<template>
  <SectionsAdvantages :title="data.title" :select="data.select" />
</template>

<script setup lang="ts">
defineProps<{
  data: {
    title: string,
    select: object
  }
}>();
</script>

<style scoped lang="scss">

</style>