<template>
  <div class="pull__cursor fz-caption">< тяни ></div>
</template>

<script setup lang="ts">

</script>

<style scoped lang="scss">
.pull__cursor {
  pointer-events: none;
  width: 8.1rem;
  height: 3.1rem;
  border-radius: var(--br-secondary);
  background: var(--fg-blue);
  position: fixed;
  display: flex;
  align-items: center;
  justify-content: center;
  color: var(--fg-white);
  z-index: 10;
  transform: translate(-50%, -50%);
  opacity: 0;
  transition: opacity .3s;

  &--active {
    opacity: 1;
  }

  @media (max-width: $tablet) {
    display: none;
  }
}
</style>