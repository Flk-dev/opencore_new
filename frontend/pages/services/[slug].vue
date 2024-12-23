<template>
  <div class="service page-paddings">
    <div class="service__container container">
      {{ post.data.content }}
      <div class="service__content" v-if="post.data.content">
        <component v-for="content in post.data.content" :is="contentLayouts[content.acf_fc_layout]" :data="content" />
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
import {
  ServicesContentWhen
} from '#components';

const route = useRoute();
const contentLayouts = ref({
  when: ServicesContentWhen
} );

const { result: post, error } = await useApi( '/services/' + route.params.slug, {}, '', true );
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