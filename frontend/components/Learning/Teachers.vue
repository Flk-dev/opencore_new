<template>
  <SectionSpeakers :title="data.title" :data="data.select" />
</template>

<script setup lang="ts">
defineProps<{
  data: {
    title: string,
    select?: object
  }
}>();
</script>

<style scoped lang="scss">

</style>