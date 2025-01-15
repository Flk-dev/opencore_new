<template>
  <SectionWeWork :title="data.title" :text="data.text" :logo="data.logo" with-list="true" />
</template>

<script setup lang="ts">
defineProps<{
  data: {
    title?: string,
    text?: string,
    logo?: string,
  }
}>();
</script>

<style scoped lang="scss">

</style>