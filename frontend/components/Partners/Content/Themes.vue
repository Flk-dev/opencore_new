<template>
  <div class="partner__themes partner-themes">
    <div class="partner-themes__container container">
      <BlockHeader :title="data.title" classes="partner-themes" />
      <ScrollLineText :data="data.row" classes="partner-themes" />
    </div>

    <PartnersContentGallery :data="data.gallery" classes="partner-themes" />
  </div>
</template>

<script setup lang="ts">
defineProps<{
  data: {
    title?: string,
    row?: object
  },
}>();

</script>

<style scoped lang="scss">
.partner-themes {
  margin-top: var(--mt-content-block);
}
</style>