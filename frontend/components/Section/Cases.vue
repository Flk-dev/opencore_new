<template>
  <section class="cases section">
    <div class="cases__container container">
      <GlobalBlockHeader :title="title" classes="cases" />
      <CasesGrid :data="data" />
      <slot />
    </div>
  </section>
</template>

<script setup lang="ts">
const props = defineProps<{
  title?: string,
  data: object,
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
  margin-bottom: 6rem;

  & .block-header__title {
    max-width: 90.9rem;
  }

  @media (max-width: $tablet) {
    margin-bottom: 8rem;
  }

  @media (max-width: $mobile) {
    margin-bottom: 6rem;
  }
}

.cases__btn  {
  @media (max-width: $tablet) {
    margin-top: 8rem;
  }
}

</style>