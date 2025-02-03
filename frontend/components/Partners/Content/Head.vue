<template>
  <div class="partner__head partner-head">
    <div class="partner-head__container container">
      <div class="partner-head__content">
        <div class="partner-head__category fz-caption" v-if="categories">
          <p v-for="category in categories">{{ category.name }}</p>
        </div>
        <h1 class="partner-head__title fz-h1" v-html="title"></h1>
        <div class="partner-head__subtitle fz-h3 fz-h2--mobile" v-if="subtitle" v-html="subtitle"></div>
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
defineProps<{
  title: string,
  subtitle?: string,
  categories?: object
}>();
</script>

<style scoped lang="scss">
.partner-head + :deep(div) {
  margin-top: var(--mt-content-block-secondary);

  @media (max-width: $tablet) {
    margin-top: 6rem;
  }

  @media (max-width: $tablet) {
    margin-top: 3rem;
  }
}

.partner-head__content {
  max-width: 80.2rem;

  @media (max-width: $tablet) {
    max-width: 70.8rem;
  }

  @media (max-width: $mobile) {
    max-width: 32rem;
  }
}

.partner-head__category {
  margin-bottom: 3rem;

  @media (max-width: $mobile) {
    margin-bottom: 1.5rem;
  }
}

.partner-head__title {
  margin: 0;
  font-weight: 600;
}

.partner-head__subtitle {
  margin-top: 1.5rem;
}

</style>