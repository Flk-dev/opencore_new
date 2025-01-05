<template>
  <SectionSliderLogos class="partners__collaboration" v-if="post.list" :slider="post.list" :title="post.title" />
</template>

<script setup lang="ts">
const { result: post } = await useApi( '/template/partners/collaborate', {}, 'partners/collaborate' );
</script>

<style scoped lang="scss">
.partners__collaboration {
  padding-bottom: 0;
}
</style>