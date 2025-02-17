<template>
  <div class="content__page page-paddings">
    <div class="content__page-container container">
      <div class="content__page-left">
        <div class="content__page-sticky" :style="{top: (!isHide ? (headerHeight + 20) : 0) + 'px'}">
          <GlobalBlockHeader class="content__page-title" :title="post.title" class-title="fz-h1--tablet fz-h1--mobile" />
          <div class="content__page-subtitle fz-h3 fz-h2--mobile" v-if="post.subtitle">{{ post.subtitle }}</div>
        </div>
      </div>
      <div class="content__page-blocks" v-if="post.page_content.length">
        <div class="content__page-block content__text"
             v-for="content in post.page_content"
             v-html="typography(content.text)">
        </div>
      </div>
    </div>
  </div>

  <GlobalFooterButton action="default" />
</template>

<script setup lang="ts">
import Typograf from "typograf";
import { useHeader } from "~/stores/header";

const route = useRoute();
const { result: post } = await useApi( '/pages/' + route.params.slug + '/', {}, '', true );

const store = useHeader();
const isHide = computed(() => store.isHide);
const headerHeight = computed(() => store.headerHeight);

const tp = new Typograf({locale: ['ru', 'en-US']});
const typography = ( text: any ) => {
  return tp.execute( text );
}
</script>

<style scoped lang="scss">
.content__page {
  &-container {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 3.5rem;

    @media (max-width: $tablet) {
      grid-template-columns: 1fr;
      row-gap: 6rem;
    }    
  }

  &-title {
    margin: 0;
  }

  &-block {
    margin-bottom: 8rem;

    --fz: var(--fz-body-b);
    --lh: var(--lh-body-b);
    --m-bottom: 2.2rem;
    --mt-ul: -1.5rem;

    &:last-child {
      margin-bottom: 0;
    }

    & :deep(a) {
      border-bottom: 1.5px solid var(--fg-blue);
    }

    @media (max-width: $tablet) {
      margin-bottom: 6rem;
    }

    @media (max-width: $mobile) {
      margin-bottom: 4rem;
      --m-bottom: 1.5rem;
    }    
  }

  &-subtitle {
    margin-top: 3rem;
    color: var(--fg-black-50);
    max-width: 44.8rem;

    @media (max-width: $mobile) {
      margin-top: 2rem;
      max-width: 24rem;
    }
  }

  &-sticky {
    position: sticky;
    top: .5rem;
    transition: all .3s;
  }
}
</style>