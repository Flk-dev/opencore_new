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

  <GlobalFooterButton>
    <template v-slot:footer>
      <div class="footer__button-grid">
        <button class="footer__button-btn btn--ripple _white">
          <span>Сделать совместный проект</span>
        </button>
        <button class="footer__button-btn btn--ripple _white">
          <span>Я подрядчик</span>
        </button>
      </div>

      <ModalsDefault
          :isOpen="true"
          title="Предложите партнёрство<br> для реализации проекта!"
          text="Мы открыты для партнёрств! Если у вас есть идея для совместного проекта или вы хотите предложить Opencore роль партнёра в вашем проекте, заполните форму ниже. Мы с радостью рассмотрим ваши предложения и свяжемся с вами для обсуждения дальнейших шагов.">
          <ModalsPartner />
      </ModalsDefault>
    </template>
  </GlobalFooterButton>
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
const contentLayouts: any = ref( {
  list: PartnersContentList,
  themes: PartnersContentThemes,
  youtube: PartnersContentYoutube,
  speakers: PartnersContentSpeakers,
  cases: PartnersContentCases
} );

const { result: post } = await useApi( '/partners/' + route.params.slug, {}, '', true );
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