<template>
  <div class="content__text" :class="classes" v-html="text"></div>
</template>

<script setup lang="ts">
defineProps<{
  text: string,
  classes?: string
}>();
</script>

<style scoped lang="scss">

</style>