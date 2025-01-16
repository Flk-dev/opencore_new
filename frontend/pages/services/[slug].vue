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
          <h1 class="service__head-title service__title fz-h2">{{ post.post_title }}</h1>
          <div class="service__head-content">
            <h3 class="service__head-subtitle" v-if="post.subtitle" v-html="post.subtitle"></h3>
            <ContentText class="service__head-text" v-if="post.full_text" :text="post.full_text" />
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
  ServicesContentAdvantages
} from '#components';

const route = useRoute();
const contentLayouts: any = ref({
  when: ServicesContentWhen,
  cases: ServicesContentCases,
  include: ServicesContentInclude,
  return: ServicesContentReturn,
  advatanges: ServicesContentAdvantages,
} );

const { result: post } = await useApi( '/services/' + route.params.slug, {}, '', true );
</script>

<style scoped lang="scss">
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
}

.service__head-flex {
  display: flex;
  justify-content: space-between;
}

.service__title {
  margin: 0;
  max-width: 50.2rem;
}

.service__head-content {
  max-width: 75.7rem;
  width: 100%;
}

.service__head-text {
  margin-top: 6rem;
  max-width: 59.2rem;
  color: var(--fg-black-75);

  --fz: var(--fz-body-b);
  --lh: var(--fz-body-b)
}
</style>