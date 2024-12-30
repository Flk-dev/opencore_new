<template>
  <NuxtLink :to="{ name: 'services-slug', params: { slug: slug } }" class="services-item">
    <div class="services-item__title fz-h2">{{ title }}</div>
    <div class="services-item__content">
      <ContentText class="services-item__text" :text="text" />
      <div class="services-item__list" v-if="list.length">
        <div class="services-item__list-item" v-for="item in list">
          <span class="services-item__list-icon" v-if="item.is_icon">🔥</span>
          <span class="services-item__list-text fz-link" v-html="item.text"></span>
        </div>
      </div>
    </div>
  </NuxtLink>
</template>

<script setup lang="ts">
defineProps<{
  title: string,
  slug: string,
  text?: string,
  list?: object
}>();
</script>

<style scoped lang="scss">
.services-item {
  padding: 3rem 0;
  margin-bottom: 9rem;
  display: flex;
  align-items: flex-start;
  justify-content: space-between;
}

.services-item__title {
  color: var(--fg-blue);
  max-width: 56.5rem;
}

.services-item__content {
  width: 79.8rem;
  max-width: 100%;
}

.services-item__text {
  --fz: var(--fz-txt-case);
  --lh: var(--lh-txt-case);
}

.services-item__list {
  margin-top: 6rem;
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  row-gap: 3rem;
  column-gap: 1.5rem;
}

.services-item__list-item {
  position: relative;
  padding-left: 2.9rem;
}

.services-item__list-icon {
  position: absolute;
  left: 0;
  top: 0;
}

.services-item__list-text {
  text-decoration: underline;
  line-height: 90%;
}
</style>