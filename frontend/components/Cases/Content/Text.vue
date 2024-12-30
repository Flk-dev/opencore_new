<template>
  <ContentBlock :text="data.text" classes="case__content _big" />
</template>

<script setup lang="ts">
defineProps<{
  data: {
    text: string
  }
}>();
</script>

<style scoped lang="scss">

</style>