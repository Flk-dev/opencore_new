<template>
  <ContentBlock :text="data.text" class="case__content _big" />
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