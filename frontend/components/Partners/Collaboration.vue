<template>
  <SectionSliderLogos class="partners__collaboration" v-if="collaborate.data.list" :slider="collaborate.data.list" :title="collaborate.data.title" />
</template>

<script setup lang="ts">
const { result: collaborate } = await useApi( '/template/partners/collaborate', {}, 'partners/collaborate' );
</script>

<style scoped lang="scss">
.partners__collaboration {
  padding-bottom: 0;
}
</style>