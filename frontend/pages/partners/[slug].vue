<template>
  <div class="partner page-paddings">
    <PartnersContentHead
        :title="post.data.title"
        :subtitle="post.data.subtitle"
        :categories="post.data.categories"
    />

    <template v-if="post.data.content" v-for="content in post.data.content">
      <component :is="contentLayouts[content.acf_fc_layout]" :data="content" class="partner__block" />
    </template>

  </div>

  <SectionsFooterButton btn="Пригласить на выступление" action="invite" />
</template>

<script setup lang="ts">
import {
  PartnersContentList,
  PartnersContentThemes,
  PartnersContentYoutube,
  PartnersContentSpeakers,
  PartnersContentCases
} from '#components';

const route = useRoute();
const contentLayouts = ref( {
  list: PartnersContentList,
  themes: PartnersContentThemes,
  youtube: PartnersContentYoutube,
  speakers: PartnersContentSpeakers,
  cases: PartnersContentCases
} );

const { result: post, error } = await useApi( '/partners/' + route.params.slug, {}, '', true );
</script>

<style scoped lang="scss">

.partner .section {
  padding: 0;
}

.partner__block {
  margin-top: var(--mt-content-block);
}

</style>