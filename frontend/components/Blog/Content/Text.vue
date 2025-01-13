<template>
  <ContentBlock :text="data.text" :classes="{ 'article__block': true, article__content: true, '_big': data.is_big_text }" />
</template>

<script setup lang="ts">
defineProps<{
  data?: {
    is_big_text: boolean,
    text?: string,
  }
}>();
</script>

<style scoped lang="scss">
.article__content {
  :deep(.content__text) {
    --m-bottom: 1.5rem;
  }
}


//.article__block {
//  margin-top: 18rem;
//}
//
//._big.article__content-block {
//
//}
//
//.article__content-block {
//  ::v-deep &._big {
//    & .article__content-text {
//      --w-title: 108.5rem;
//      --w-text: 90rem;
//
//      --fz: 2.8rem;
//      --lh: 125%;
//    }
//  }
//}
//
//.article__content-text {
//  --fz: 1.7rem;
//  --lh: 130%;
//  --m-bottom: 3rem;
//
//  --w-title: 110rem;
//  --w-text: 70rem;
//
//  ::v-deep & img {
//    width: 100%;
//    height: auto;
//    border-radius: var(--br-regular);
//    margin: 6rem 0;
//  }
//
//  ::v-deep h2,
//  ::v-deep h3,
//  ::v-deep h4,
//  ::v-deep h5,
//  ::v-deep h6 {
//    margin: 0 0 5.6rem auto;
//    max-width: var(--w-title);
//  }
//
//  ::v-deep p {
//    &:not(:has(iframe, img)) {
//      max-width: var(--w-text);
//      margin-left: auto;
//    }
//  }
//
//  ::v-deep p:has(iframe) {
//    margin: 6rem 0;
//  }
//
//  ::v-deep iframe {
//    width: 100%;
//    min-height: 78.8rem;
//    border-radius: var(--br-regular);
//    max-width: 100%;
//  }
//
//  ::v-deep ul,
//  ::v-deep ol {
//    max-width: var(--w-text);
//    margin-left: auto;
//  }
//}

//.article__content-block {
//  margin-left: auto;
//
//  &._big {
//    & .article__content-text {
//      max-width: 90rem;
//      --fz: 2.8rem;
//      --lh: 125%;
//      --mb: 1.5rem;
//    }
//
//    & .article__content-title {
//      max-width: 108.5rem;
//    }
//  }
//}
//
//.article__content-title {
//  margin-left: auto;
//  margin-bottom: 5.7rem;
//  max-width: 112rem;
//}
//
//.article__content-blockquote {
//  font-size: 3.2rem;
//  line-height: 125%;
//  letter-spacing: -.1rem;
//  margin-bottom: 5rem;
//}
//
//.article__content-text {
//  max-width: 70rem;
//  margin-left: auto;
//
//  &._before {
//    margin-bottom: 6rem;
//  }
//}
//
//.article__content-media {
//  margin-bottom: 6rem;
//
//  ::v-deep .image__img {
//    width: 100%;
//    height: auto;
//  }
//}

</style>