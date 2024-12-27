<template>
  <div class="methodology__advantages methodology-advantages" v-if="data.list.length">
    <div class="container">
      <PageTitle :title="data.title" class="methodology-advantages__title" />
      <div class="methodology-advantages__grid">
        <div class="methodology-advantages__item" v-for="(item, key) in data.list" :key="key">
          <div class="methodology-advantages__item-icon" v-if="item.icon">
            <img :src="item.icon" alt="">
          </div>
          <div class="methodology-advantages__item-title fz-h3" v-if="item.title" v-html="item.title"></div>
          <ContentText :text="item.text" class="methodology-advantages__item-text" />
        </div>
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
defineProps<{
  data: {
    title?: string,
    list: object
  }
}>();
</script>

<style scoped lang="scss">
.methodology-advantages__title {
  max-width: 92.2rem;
  margin-bottom: var(--mt-content-third);
}

.methodology-advantages__grid {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: 4.8rem;
}

.methodology-advantages__item-icon {
  margin-bottom: 3rem;
}

.methodology-advantages__item-title {
  margin-bottom: 3rem;
}

.methodology-advantages__item-text {
  color: var(--fg-gray-2);
  --fz: 2.2rem;
  --lh: 120%;
  margin-top: 3rem;
}
</style>