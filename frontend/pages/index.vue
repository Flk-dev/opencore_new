<template>
  <HomeHero />

  <template v-if="post.content" v-for="content in post.content">
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

const contentLayouts: any = ref( {
  cases: HomeCases,
  service: HomeService,
  we_work: HomeWeWork,
  return: HomeReturn,
  reviews: HomeReviews,
  festival: HomeFestival,
  //advantages: HomeAdvantages,
} );

const { result: post } = await useApi( '/template/home', {}, '', true );
</script>

<style scoped lang="scss">

</style>