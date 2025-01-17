<template>
  <div class="partner page-pd-bottom">
    <PartnersContentHead
        :title="post.title"
        :subtitle="post.subtitle"
        :categories="post.categories"
    />

    <template v-if="post.content" v-for="content in post.content">
      <component :is="contentLayouts[content.acf_fc_layout]" :data="content" class="partner__block" />
    </template>
  </div>

  <GlobalFooterButton
      btnTitle="Пригласить на выступление"
      @click="modal.open( ModalsPartnerInvite, {
        title: 'Давайте общаться'
      } )"
  />
</template>

<script setup lang="ts">
import {
  PartnersContentList,
  PartnersContentThemes,
  PartnersContentYoutube,
  PartnersContentSpeakers,
  PartnersContentCases,
  ModalsPartnerInvite
} from '#components';

const route = useRoute();
const contentLayouts: any = ref( {
  list: PartnersContentList,
  themes: PartnersContentThemes,
  youtube: PartnersContentYoutube,
  speakers: PartnersContentSpeakers,
  cases: PartnersContentCases
} );

const { result: post } = await useApi( '/partners/' + route.params.slug, {}, '', true );

const modal = useModal();
</script>

<style scoped lang="scss">
.partner {
  padding-top: 10rem;

  @media (max-width: $tablet) {
    padding-top: 8rem;
  }

  @media (max-width: $mobile) {
    padding-top: 4rem;
  }
}

.partner .section {
  padding: 0;
}

.partner__block {
  margin-top: var(--mt-content-block);
}

</style>