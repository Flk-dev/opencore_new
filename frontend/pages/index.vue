<template>
  <HomeHero />
  <template v-if="post.data.content" v-for="content in post.data.content">
    <component :is="contentLayouts[content.acf_fc_layout]" :data="content" />
  </template>

  <GlobalFooterButton />
</template>

<script setup lang="ts">
import {
  HomeCases,
  HomeService,
  HomeWeWork,
  HomeReturn,
  HomeReviews,
  HomeFestival,
  HomeAdvantages
} from '#components';

const route = useRoute();
const contentLayouts = ref( {
  cases: HomeCases,
  service: HomeService,
  we_work: HomeWeWork,
  return: HomeReturn,
  reviews: HomeReviews,
  festival: HomeFestival,
  advantages: HomeAdvantages,
} );

const { result: post, error } = await useApi( '/template/home', {}, '', true );
</script>

<style scoped lang="scss">

</style>