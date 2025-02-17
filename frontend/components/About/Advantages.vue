<template>
  <SectionAdvantages :title="data.title" v-if="data.select" :select="data.select" />
</template>

<script setup lang="ts">
defineProps<{
  data: {
    title: string,
    select: Array<{
      post_id: number,
      title: string,
      icon: string,
      text: string
    }>
  }
}>();
</script>

<style scoped lang="scss">

</style>