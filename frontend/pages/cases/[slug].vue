<template>
  <div class="case page-paddings">
    <div class="case__header">
      <div class="container">
        <h1 class="case__title fz-h2" v-if="post.data.post_title">{{ post.data.post_title }}</h1>
      </div>
    </div>
    <div class="case__content" v-if="post.data.content">
      <component v-for="content in post.data.content" :is="contentLayouts[content.acf_fc_layout]" :data="content" />
    </div>
  </div>
</template>

<script setup lang="ts">
import {
  CasesContentText,
  CasesContentAchievement,
  CasesContentImage,
  CasesContentTasks,
  CasesContentTeam
} from '#components';

const route = useRoute();
const contentLayouts = ref( {
  text: CasesContentText,
  achievement: CasesContentAchievement,
  image: CasesContentImage,
  tasks: CasesContentTasks,
  team: CasesContentTeam,
} );

const { result: post, error } = await useApi( '/cases/' + route.params.slug, {}, '', true );
</script>

<style scoped lang="scss">
.case {
  padding-top: 5rem;
}

.case__title {
  max-width: 104.5rem;
  margin: 0 0 6rem;
}
</style>