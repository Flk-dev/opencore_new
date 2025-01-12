<template>
  <div class="partner__themes partner-themes">
    <div class="partner-themes__container container">
      <GlobalBlockHeader :title="data.title" classes="partner-themes" />
      <GlobalScrollText :data="data.row" classes="partner-themes" />
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

</style>