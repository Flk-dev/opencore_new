<template>
  <div class="container">
    <UIButton :title="data.button" class="article__button btn--ripple"  />
  </div>
</template>

<script setup lang="ts">
defineProps<{
  data: {
    button: string,
    type: string,
    link?: string
  }
}>();
</script>

<style scoped lang="scss">
.article__button {
  margin-top: 18rem;
}
</style>