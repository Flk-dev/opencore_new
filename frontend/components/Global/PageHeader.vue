<template>
  <div class="page__header" :class="{ 'page__header--sticky': isSticky }">
    <div class="page__header-container container">
      <slot />
    </div>
  </div>
</template>

<script setup lang="ts">
withDefaults(defineProps<{
  isSticky?: boolean;
}>(), {
  isSticky: false,
});
</script>

<style lang="scss">
.page__header {
  padding: 12rem 0;

  @media (max-width: $tablet) {
    padding: 10rem 0;
  }

  @media (max-width: $mobile) {
    padding: 8rem 0;
  }

  &--sticky {
    position: sticky;
    top: 0;
    z-index: -1;
    background: var(--fg-white);
  }

  & svg {
    margin: 0 auto;

    @media (max-width: $tablet) {
      height: 6.3rem;
    }

    @media (max-width: $mobile) {
      height: 2.9rem;
    }
  }
}

</style>