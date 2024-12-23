<template>
  <div class="case page-paddings">
    <div class="case__header">
      <div class="container">
        <h1 class="case__title fz-h2">{{ post.data.title }}</h1>
      </div>
    </div>
    <div class="case__content" v-if="post.data.content">
      <component v-for="content in post.data.content" :is="contentLayouts[content.acf_fc_layout]" :data="content" />
    </div>
  </div>
</template>

<script setup lang="ts">
import { CasesContentText } from '#components';

const route = useRoute();
const contentLayouts = ref( {
  text: CasesContentText,
} );

const { result: post, error } = await useApi( '/cases/' + route.params.slug, {}, '', true );
console.log( post );
</script>

<style scoped lang="scss">
.case {
  padding-top: 5rem;
}
</style>