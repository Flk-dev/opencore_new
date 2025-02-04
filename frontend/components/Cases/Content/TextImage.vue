<template>
  <div class="case-ti">
    <div class="case__container container">
      <div class="case-ti__flex">
        <div class="case-ti__media" v-if="data.image">
          <img :src="data.image" alt="">
        </div>
        <div class="case-ti__content" v-if="data.text">
          <ContentText class="case-ti__text" :text="data.text" />
        </div>
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
defineProps<{
  data: {
    image?: string,
    text?: string,
  }
}>();
</script>

<style scoped lang="scss">
.case-ti {
  margin-top: var(--mt-content-third);
  --w-content: 90rem;

  @media (max-width: $tablet) {
    --w-content: 100%;
  }

  &__flex {
    display: flex;
    align-items: flex-start;

    @media (max-width: $tablet) {
      flex-direction: column;
    }
  }

  &__media {
    width: calc(100% - var(--w-content));

    @media (max-width: $tablet) {
      width: 100%;
      margin-bottom: 4rem;
    }
  }

  &__content {
    width: var(--w-content);
    max-width: 100%;
  }

  &__text {
    --fz: var(--fz-txt-case);
    --lh: var(--lh-txt-case);
    --top-ul-icon: 1.5rem;
    
    @media (max-width: $mobile) {
      --top-ul-icon: 1rem;
    }
  }

}
</style>