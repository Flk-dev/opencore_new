<template>
  <div class="page__header">
    <div class="page__header-container container">
      <slot />
    </div>
  </div>
</template>

<script setup>

</script>

<style scoped lang="scss">

.page__header {
  padding: 12rem 0;

  & svg {
    margin: 0 auto;
  }
}

</style>