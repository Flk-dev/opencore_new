<template>
  <HomeHero />
  <template v-if="post.data.content" v-for="content in post.data.content">
    <component :is="contentLayouts[content.acf_fc_layout]" :data="content" />
  </template>
</template>

<script setup lang="ts">
import { HomeReviews, HomeFestival, HomeAdvantages } from '#components';

const route = useRoute();
const contentLayouts = ref( {
  advantages: HomeAdvantages,
  festival: HomeFestival,
  reviews: HomeReviews,
} );

const { result: post, error } = await useApi( '/template/home', {}, '', true );
</script>

<style scoped lang="scss">

</style>