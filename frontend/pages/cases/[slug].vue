<template>
  <div class="case page-paddings">
    <div class="case__header">
      <div class="container">
        <h1 class="case__title fz-h2 fz-h1--tablet" v-if="post.post_title">{{ post.post_title }}</h1>
      </div>
    </div>
    <div class="case__content" v-if="post.content">
      <component v-for="content in post.content" :is="contentLayouts[content.acf_fc_layout]" :data="content" />
    </div>
  </div>

  <NuxtLink v-if="post.next && post.next.link" :to="{ name: 'cases-slug', params: { slug: post.next.link } }" class="case__next">
    <div class="container">
      <div class="case__next-header">
        <div class="case__next-title fz-h2 fz-h1--tablet" v-html="post.next.title"></div>
        <div class="case__next-btn fz-button">
          <span>следующий проект</span>
          <svg width="26" height="26" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M9.06992 20.824L0 13.0636L0 15.4822L11.7551 25.5401C12.102 25.8369 12.5435 26 13 26C13.4565 26 13.898 25.8369 14.2449 25.5401L26 15.4822L26 13.0636L16.9301 20.824C15.6629 21.9082 13.7074 21.0078 13.7074 19.3401L13.7074 0L12.2926 0L12.2926 19.3401C12.2926 21.0078 10.3371 21.9082 9.06992 20.824Z" fill="#0C0C0C"/>
          </svg>
        </div>
      </div>
    </div>
    <UIImage class="case__next-img" :image="post.next.image" classes-pic="item--cover" />
  </NuxtLink>
</template>

<script setup lang="ts">
import {
  CasesContentText,
  CasesContentAchievement,
  CasesContentImage,
  CasesContentVideo,
  CasesContentTasks,
  CasesContentTeam,
  CasesContentTextImage
} from '#components';

const route = useRoute();
const contentLayouts: any = ref( {
  text: CasesContentText,
  achievement: CasesContentAchievement,
  image: CasesContentImage,
  video: CasesContentVideo,
  tasks: CasesContentTasks,
  team: CasesContentTeam,
  text_photo: CasesContentTextImage,
} );

const { result: post } = await useApi( '/cases/' + route.params.slug, {}, '', true );
</script>

<style scoped lang="scss">
.case {
  padding-top: 5rem;
}

.case__title {
  max-width: 104.5rem;
  margin: 0 0 6rem;

  @media (max-width: $mobile) {
    margin: 0 0 3rem;
  }
}

.case__next {
  &-header {
    display: flex;
    align-items: flex-start;
    justify-content: space-between;
    margin-bottom: 4rem;

    @media (max-width: $tablet) {
      margin-bottom: 3rem;
    }
  }

  &-title {
    max-width: 100rem
  }

  &-btn {
    display: flex;
    align-items: center;
    font-size: var(--fz-button);
    line-height: var(--lh-button);

    & svg {
      margin-left: 2rem;
      transition: var(--tr-regular);
    }

    @media (max-width: $tablet) {
      display: none;
    }
  }

  &-img {
   :deep(.image__picture){
     height: 58.6rem;
     border-radius: 0;
   }
  }
}

</style>