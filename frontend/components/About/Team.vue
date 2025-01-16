<template>
  <SectionTeam class="about__team" :title="data.title" :data="data.select" />
</template>

<script setup lang="ts">
defineProps<{
  data: {
    select: object,
    title?: string
  }
}>();
</script>


<style scoped lang="scss">

</style>