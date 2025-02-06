<template>
  <div class="article page-paddings">
    <div class="article__back">
      <div class="container">
        <NuxtLink to="/blog" class="article__back-link fz-link">
          <svg width="26" height="26" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M5.17599 16.9301L12.9364 26H10.5178L0.459908 14.2449C0.163105 13.898 0 13.4565 0 13C0 12.5435 0.163105 12.102 0.459908 11.7551L10.5178 0L12.9364 0L5.17599 9.06992C4.09175 10.3371 4.99218 12.2926 6.65991 12.2926L26 12.2926V13.7074L6.65991 13.7074C4.99218 13.7074 4.09175 15.6629 5.17599 16.9301Z" fill="#0000FF"/>
          </svg>
          <span>Все статьи</span>
        </NuxtLink>
      </div>
    </div>

    <BlogContentHead
        :title="post.title"
        :image="post.image"
        :read-time="post.time_read"
        :categories="post.categories"
    />

    <div class="article__content" v-if="post.content">
      <component v-for="content in post.content" :is="contentLayouts[content.acf_fc_layout]" :data="content" />
    </div>
  </div>

  <GlobalFooterButton />
</template>

<script setup lang="ts">
import {
  BlogContentText,
  BlogContentButton,
  BlogContentCases
} from '#components';

const route = useRoute();
const contentLayouts : any = ref( {
  block: BlogContentText,
  button: BlogContentButton,
  cases: BlogContentCases,
} );

const { result: post } = await useApi( '/blog/' + route.params.slug, {}, true );
</script>

<style scoped lang="scss">
.article {
  @media (max-width: $tablet) {
    padding-top: 0;
  }
}

.article .section {
  padding: 0;
}

.article__back {
  margin-bottom: 3.3rem;

  @media (max-width: $tablet) {
    display: none;
  }
}

.article__back-link {
  display: flex;
  align-items: center;
  color: var(--fg-blue);

  & span {
    margin-left: 1.4rem;
  }
}

</style>