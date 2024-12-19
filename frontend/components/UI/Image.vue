<template>
  <div class="image" :class="classes" v-if="image">
    <picture class="image__picture" :class="classes_pic">
      <img :src="image" class="image__img" :alt="title">
    </picture>
    <slot />
  </div>
</template>

<script setup lang="ts">
const props = defineProps<{
  image?: string,
  title?: string,
  classes_pic?: string
}>();
</script>

<style scoped lang="scss">
.image__picture {
  position: relative;
  background: var(--fg-blue);
  border-radius: var(--br-regular);
  overflow: hidden;
}
</style>