<template>
  <SectionAdvantages class="service__advantages" :title="data.title" :select="data.select" />
</template>

<script setup lang="ts">
defineProps<{
  data: {
    title?: string,
    select: object
  }
}>();
</script>

<style scoped>
.service__advantages {

}
</style>