<template>
  <div class="image" :class="classes" v-if="image">
    <picture class="image__picture" :class="classesPic">
      <img :src="image" class="image__img" :alt="title">
    </picture>
    <slot />
  </div>
</template>

<script setup lang="ts">
defineProps<{
  image?: string,
  title?: string,
  classes?: string,
  classesPic?: string
}>();
</script>

<style scoped lang="scss">
.image {
  position: relative;

  &--border {
    & .image__picture {
      border-top: .1rem solid #888;
      border-bottom: .1rem solid #888;
    }
  }
}

.image__picture {
  position: relative;
  background: var(--fg-blue);
  border-radius: var(--br-regular);
  overflow: hidden;
}
</style>