<template>
  <div class="career__values career-values">
    <div class="career-values__container container">
      <GlobalBlockHeader :title="data.title" classes="career-values" class-title="fz-h1--tablet"/>
      <div class="career-values__block" v-if="data.list">
        <GlobalAnimatedCircle :list="data.list" />
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">defineProps<{
  data: {
    title?: string,
    list: object,
  }
}>();
</script>

<style scoped lang="scss">
.career-values {
  margin-top: var(--mt-content-block);

  &__block-header {
    margin-bottom: 4rem;

    @media (max-width: $mobile) {
      margin-bottom: 3rem;
    }
  }

  &__block {
    padding: 2.1rem 0 1.9rem;
    background: var(--fg-blue);
    color: var(--fg-white);
    border-radius: var(--br-regular);

    @media (max-width: $tablet) {
      padding: 1.1rem 0;
    }

    @media (max-width: $mobile) {
      margin: 0 var(--m-m-container);
      padding: 2rem 0;
    }
  }
}


</style>