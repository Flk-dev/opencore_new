<template>
  <section class="cases section">
    <div class="cases__container container">
      <GlobalBlockHeader
          :title="title"
          classes="cases"
          class-title="fz-h1--tablet"
      />
      <slot name="filters"></slot>
      <CasesGrid :data="data" />
      <slot />
    </div>
  </section>
</template>

<script setup lang="ts">
defineProps<{
  title?: string,
  data: object,
  categories?: object
}>();
</script>

<style scoped lang="scss">
.cases {
  padding-top: 15rem;
  position: relative;
  overflow: hidden;

  @media (max-width: $tablet) {
    padding-top: 9rem;
  }
}

.cases__block-header {
  margin-bottom: 10rem;

  & :deep( .block-header__title ) {
    max-width: 86rem;
  }

  @media (max-width: $tablet) {
    margin-bottom: 6rem;
  }

  @media (max-width: $mobile) {
    margin-bottom: 4rem;
  }
}

.cases__btn  {
  @media (max-width: $tablet) {
    margin-top: 8rem;
  }
}

</style>