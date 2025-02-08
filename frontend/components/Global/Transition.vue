<template>
  <div class="transition">
    <div class="transition__block transition__first">
      <div class="transition__first-inner"></div>
    </div>
    <div class="transition__block transition__last">
      <div class="transition__last-inner"></div>
    </div>
  </div>
</template>

<script setup lang="ts">

</script>

<style scoped lang="scss">
.transition {
  position: fixed;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  overflow: hidden;
  z-index: 500;
  pointer-events: none;
  transform: translateZ(0) rotate(0.001deg);
  isolation: isolate;

  &__first,
  &__last,
  &__last-inner,
  &__first-inner {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
    transform: translateZ(0) rotate(0.001deg);
    overflow: hidden;
    pointer-events: all;
    isolation: isolate;
  }

  &__first {
    z-index: 2;
  }

  &__last {
    z-index: 1;
  }

  &__bg {
    position: fixed;
    top: 0;
    left: 0;
    width: 100vw;
    height: 100vh;
    pointer-events: none;
    background: var(--fg-blue);


    &--secondary {
      background: var(--fg-black-50);
    }
  }
}
</style>