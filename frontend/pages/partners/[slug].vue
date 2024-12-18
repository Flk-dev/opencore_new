<template>
  <div class="partner page-paddings">

    {{ post.data.content }}
    <PartnersContentHead
        :title="post.data.title"
        :subtitle="post.data.subtitle"
        :categories="post.data.categories"
    />

    <template v-if="post.data.content" v-for="content in post.data.content">
      <component :is="contentLayouts[content.acf_fc_layout]" :data="content" />
    </template>

  </div>
</template>

<script setup lang="ts">
import { PartnersContentList, PartnersContentThemes } from '#components';

const route = useRoute();
const contentLayouts = ref( {
  list: PartnersContentList,
  themes: PartnersContentThemes,
  //text: PartnersContentHead,
  //image: BlogContentImage
} );

const { result: post, error } = await useApi( '/partners/' + route.params.slug, {}, '', true );
</script>

<style scoped lang="scss">

</style>