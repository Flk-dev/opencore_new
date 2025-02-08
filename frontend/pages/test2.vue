<template>
  <div class="transition">
    <div class="transition__block transition__first">
      <div class="transition__first-inner">
        <div class="transition__bg"></div>
        <div class="transition__text">
          <div class="transition__text-inner">
            <div class="transition__text-item transition__text--first" data-word-active="true">core</div>
            <div class="transition__text-item transition__text--secondary" data-word-active="false">steady</div>
            <div class="transition__text-item transition__text--third" data-word-active="false">ready</div>
          </div>
        </div>
      </div>
    </div>
    <div class="transition__block transition__last">
      <div class="transition__last-inner">
        <div class="transition__bg transition__bg--secondary"></div>
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
import { initWords, initPageIn } from "~/utils/pageTransition";

onMounted( () => {
  initWords();
} );
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
      background: var(--fg-white);
    }
  }

  &__text {
    position: absolute;
    width: 100%;
    bottom: 4.2rem;
    padding: 0 3.3rem;

    &-item {
      font-family: var(--ff-atyp);
      font-style: italic;
      font-size: 23.3rem;
      line-height: 80%;
      letter-spacing: -.4rem;
      text-transform: uppercase;
      color: var(--fg-white);
      display: none;
      transition: opacity .2s;

      &[data-word-active="true"] {
        display: block;
      }
    }
  }
}

</style>