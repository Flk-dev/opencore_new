<template>
  <div class="partner__head partner-head">
    <div class="partner-head__container container">
      <div class="partner-head__content">
        <div class="partner-head__category fz-caption" v-if="categories">
          <p v-for="category in categories">{{ category.name }}</p>
        </div>
        <h1 class="partner-head__title fz-h1">{{ title }}</h1>
        <div class="partner-head__subtitle fz-h3" v-if="subtitle" v-html="subtitle"></div>
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

.partner-head__content {
  max-width: 80.2rem;
}

.partner-head__category {
  margin-bottom: 3.5rem;
}

.partner-head__title {
  margin: 0;
  font-weight: 600;
}

.partner-head__subtitle {
  margin-top: 1.5rem;
}

</style>