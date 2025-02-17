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

  <GlobalFooterButton v-if="route.params.slug === 'sdelaem-proekt-v-kollaboraczii'">
    <template v-slot:footer>
      <div class="footer__button-grid">
        <UIButton
          title="Сделать совместный проект"
          class="footer__button-btn btn--white"
          @click="modal.open( ModalsPartnerSuggest, {
              title: 'Предложите партнёрство<br> для реализации проекта!',
              text: 'Мы открыты для партнёрств! Если у вас есть идея для совместного проекта или вы хотите предложить Opencore роль партнёра в вашем проекте, заполните форму ниже. Мы с радостью рассмотрим ваши предложения и свяжемся с вами для обсуждения дальнейших шагов.'
          } )"
        />
        <UIButton
          title="Я подрядчик"
          class="footer__button-btn btn--white"
          @click="modal.open( ModalsPartnerAlways, {
              title: 'Мы всегда открыты для новых партнеров.',
              text: 'Если у вас есть опыт в брендинге, маркетинге, дизайне, веб-разработке или других областях, заполните форму, чтобы присоединиться к пулу подрядчиков.'
          } )"
        />
      </div>
    </template>
  </GlobalFooterButton>

  <GlobalFooterButton v-else
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
  ModalsPartnerInvite,
  ModalsPartnerSuggest,
  ModalsPartnerAlways
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