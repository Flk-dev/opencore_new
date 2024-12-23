<template>
  <div class="case-achievement" v-if="data.list">
    <div class="case__container container">
      <div class="case-achievement__list">
        <div class="case-achievement__item fz-caption" v-for="(item, key) in data.list" :key="key" v-html="item.text"></div>
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
defineProps<{
  data: {
    list: object
  }
}>();
</script>

<style scoped lang="scss">
.case-achievement {
  margin-top: 6rem;
  overflow: hidden;
}

.case-achievement__list {
  margin-right: var(--m-m-container);
  display: flex;
  flex-wrap: nowrap;
}

.case-achievement__item {
  min-width: 26.4rem;
  margin-right: 8rem;
  color: var(--fg-blue);
  white-space: nowrap;
}
</style>