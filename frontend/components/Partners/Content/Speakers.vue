<template>
  <SectionSpeakers :title="data.title" :data="data.select" />
</template>

<script setup lang="ts">
defineProps<{
  data: {
    title: string,
    select: string
  }
}>();
</script>

<style scoped lang="scss">

</style>