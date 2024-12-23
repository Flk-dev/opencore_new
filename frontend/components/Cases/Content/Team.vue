<template>
<div class="case-team" v-if="data.list.length">
  <div class="case__container container">
    <h4 class="case-team__title fz-h4">{{ data.title }}</h4>
    <div class="case-team__list">
      <div class="case-team__item" v-for="(item, key) in data.list" :key="key">
        <div class="case-team__item-name fz-body">{{ item.name }}</div>
        <div class="case-team__item-post fz-caption" v-if="item.text" v-html="item.text"></div>
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
.case-team {
  margin-top: var(--mt-content-block);
}

.case-team__list {
  display: grid;
  grid-template-columns: repeat(4, 1fr);
  column-gap: 9rem;
  row-gap: 8.1rem;
}

.case-team__title {
  margin-bottom: 8rem;
}

.case-team__item-post {
  margin-top: 1.5rem;
  color: var(--fg-blue);
}
</style>