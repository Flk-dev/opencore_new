<template>
  <div class="page__header">
    <div class="page__header-container container">
      <slot />
    </div>
  </div>
</template>

<script setup>

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
}

.page__header-container svg {
  margin: 0 auto;

  @media (max-width: $tablet) {
    height: 6.3rem;
  }

  @media (max-width: $mobile) {
    height: 2.9rem;
  }
}

.page__header + .page-paddings {
  padding-top: 0;
}

</style>