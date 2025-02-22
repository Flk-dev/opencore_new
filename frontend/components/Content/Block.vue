<template>
  <div class="content" :class="classes">
    <div class="content__container container">
      <div class="content__block">
        <ContentText v-if="text" :text="typography( text )" :classes="classesText" />
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
import Typograf from "typograf";

defineProps<{
  classes?: string,
  text?: string,
  classesText?: string,
}>();

const tp = new Typograf({locale: ['ru', 'en-US']});
const typography = ( text: any ) => {
  return tp.execute( text );
}
</script>

<style scoped lang="scss">
.content {
  --mt-block: var(--mt-content-third);
  --w-title: 110rem;
  --w-text: 70rem;

  margin-top: var(--mt-block);

  &:first-child {
    margin-top: 0;
  }

  &._big {
      --w-title: 108.5rem;
      --w-text: 90rem;

    & .content__text {
      --fz: 2.8rem;
      --lh: 125%;
      --top-ul-icon: 1.5rem;

      @media (max-width: $mobile) {
        --fz: 1.8rem;
        --top-ul-icon: .85rem;
      }
    }
  }
}

.content__text {
    --fz: 1.7rem;
    --lh: 130%;
    --m-bottom: 3rem;

    :deep(img) {
      width: 100%;
      height: auto;
      border-radius: var(--br-regular);
      margin: 6rem 0;

    }

    //:deep(p:has(img)){
    //  margin-left: var(--m-m-container);
    //  margin-right: var(--m-m-container);
    //}

    :deep(h2),
    :deep(h3),
    :deep(h4),
    :deep(h5),
    :deep(h6) {
      margin: 6rem 0 5.6rem auto;
      max-width: var(--w-title);

      @media (max-width: $mobile) {
        margin: 0 0 3rem;
      }
    }

    @media (max-width: $mobile) {
      :deep(h2) {
        font-size: var(--fz-h1);
        line-height: var(--lh-h1);
        letter-spacing: var(--lc-h1);
      }
    }

    :deep(p) {
      &:not(:has(iframe, img)) {
        max-width: var(--w-text);
        margin-left: auto;

        @media (max-width: $tablet) {
          margin-left: 0;
        }
      }
    }

    :deep(p:has(iframe)) {
      margin: 6rem 0;

      @media (max-width: $mobile) {
        margin: 4rem 0;
      }
    }

    :deep(iframe) {
      width: 100%;
      min-height: 78.8rem;
      border-radius: var(--br-regular);
      max-width: 100%;

      @media (max-width: $tablet) {
        min-height: 40rem;
      }

      @media (max-width: $mobile) {
        min-height: 18.9rem;
        height: 18.9rem;
      }
    }

    :deep(ul),
    :deep(ol) {
      max-width: var(--w-text);
      margin-left: auto;
    }
}
</style>