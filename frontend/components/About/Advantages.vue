<template>
  <SectionAdvantages :title="data.title" v-if="data.select" :select="data.select" />
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