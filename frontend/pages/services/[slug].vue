<template>
  <div class="service page-paddings">
    <div class="service__head">
      <div class="container">
        <button @click="$router.back()" class="service__back fz-link">
          <svg width="26" height="26" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M5.17599 16.9301L12.9364 26H10.5178L0.459908 14.2449C0.163105 13.898 0 13.4565 0 13C0 12.5435 0.163105 12.102 0.459908 11.7551L10.5178 0L12.9364 0L5.17599 9.06992C4.09175 10.3371 4.99218 12.2926 6.65991 12.2926L26 12.2926V13.7074L6.65991 13.7074C4.99218 13.7074 4.09175 15.6629 5.17599 16.9301Z" fill="#0000FF"/>
          </svg>
          <span>Назад (все услуги)</span>
        </button>
        <div class="service__head-flex">
          <h1 class="service__head-title service__title fz-h2 fz-h1--tablet animate animate__fadeIn" v-animate>
            <span class="_up">{{ post.post_title }}</span>
          </h1>
          <div class="service__head-content">
            <h3 class="service__head-subtitle fz-h4--tablet fz-h2--mobile animate animate__fadeIn" v-if="post.subtitle" v-animate>
              <span class="_up" v-html="post.subtitle"></span>
            </h3>
            <ContentText class="service__head-text" v-if="post.full_text" :text="fixText(post.full_text)" />
          </div>
        </div>
      </div>
    </div>
    <div class="service__content" v-if="post.content">
      <component v-for="content in post.content" :is="contentLayouts[content.acf_fc_layout]" :data="content" />
    </div>
  </div>

  <GlobalFooterButton />
</template>

<script setup lang="ts">
import {
  ServicesContentWhen,
  ServicesContentCases,
  ServicesContentInclude,
  ServicesContentReturn,
  ServicesContentAdvantages,
  ServicesContentWith
} from '#components';

const route = useRoute();
const contentLayouts: any = ref({
  //when: ServicesContentWhen,
  when_2: ServicesContentWhen,
  cases: ServicesContentCases,
  include: ServicesContentInclude,
  return: ServicesContentReturn,
  advatanges: ServicesContentAdvantages,
  with_service: ServicesContentWith,
} );

const { result: post } = await useApi( '/services/' + route.params.slug, {}, '', true );
</script>

<style scoped lang="scss">
.service {
  @media (max-width: $mobile) {
    padding-top: 2rem;
  }
}

.service:has(.service__advantages:last-child) {
  padding-bottom: 0;
}

.service .section:not(.service__advantages) {
  padding: 0;
}

.service__back {
  display: flex;
  align-items: center;
  color: var(--fg-blue);
  margin-bottom: 6rem;

  & svg {
    margin-right: 1.4rem;
  }

  @media (max-width: $mobile) {
    margin-bottom: 4rem;
  }
}

.service__head-flex {
  display: flex;
  justify-content: space-between;

  @media (max-width: $tablet) {
    flex-direction: column;
    max-width: 64.7rem;
  }
}

.service__title {
  margin: 0;
  max-width: 50.2rem;

  @media (max-width: $tablet) {
    max-width: 100%;
    margin-bottom: 3rem;
  }
}

.service__head-content {
  max-width: 75.7rem;
  width: 100%;

  @media (max-width: $tablet) {
    max-width: 100%;
  }
}

.service__head-text {
  margin-top: 6rem;
  max-width: 59.2rem;
  color: var(--fg-black-75);

  --fz: var(--fz-body-b);
  --lh: 120%;

  @media (max-width: $mobile) {
    margin-top: 4rem;
    letter-spacing: .02rem;
  }
}
</style>