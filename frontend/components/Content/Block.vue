<template>
  <div class="content" :class="classes">
    <div class="content__container container">
      <div class="content__block">
        <ContentText v-if="text" :text="text" :classes="classesText" />
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
defineProps<{
  classes?: string,
  text?: string,
  classesText?: string,
}>();
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

      @media (max-width: $mobile) {
        --fz: 1.8rem;
      }
    }
  }
}

.content__text {
    --fz: 1.7rem;
    --lh: 130%;
    --m-bottom: 3rem;

    ::v-deep & img {
      width: 100%;
      height: auto;
      border-radius: var(--br-regular);
      margin: 6rem 0;

      @media (max-width: $mobile) {
        margin: 3rem 0;
      }
    }

    ::v-deep h2,
    ::v-deep h3,
    ::v-deep h4,
    ::v-deep h5,
    ::v-deep h6 {
      margin: 0 0 5.6rem auto;
      max-width: var(--w-title);
    }

    ::v-deep p {
      &:not(:has(iframe, img)) {
        max-width: var(--w-text);
        margin-left: auto;
      }
    }

    ::v-deep p:has(iframe) {
      margin: 6rem 0;
    }

    ::v-deep iframe {
      width: 100%;
      min-height: 78.8rem;
      border-radius: var(--br-regular);
      max-width: 100%;
    }

    ::v-deep ul,
    ::v-deep ol {
      max-width: var(--w-text);
      margin-left: auto;
    }
}
</style>