<template>
<div class="service-include" v-if="data.list.length">
  <div class="service__container container">
    <BlockHeader :title="data.title" classes="service-include" :text="data.text" />
    <div class="service-include__list">
      <div class="service-include__item" v-for="(item, key) in data.list">
        <div class="service-include__item-main">
          <div class="service-include__item-number fz-h2">{{ getFormatNumber( key + 1 ) }}</div>
          <div class="service-include__item-title fz-h2" v-html="item.title"></div>
        </div>
        <div class="service-include__item-list" v-if="item.list.length">
          <div class="service-include__item-value" v-for="(listItem, listKey) in item.list" :key="listKey" v-html="listItem.text"></div>
        </div>
      </div>
    </div>
  </div>
</div>
</template>

<script setup lang="ts">
defineProps<{
  data: {
    title?: string,
    text?: string,
    list: object
  }
}>();
</script>

<style scoped lang="scss">
.service-include {
  margin-top: var(--mt-content-block);
}

.service-include__block-header {
  align-items: flex-start;
  margin-bottom: var(--mb-block-header-third);

  ::v-deep .block-header__title {
    max-width: 60rem;
  }

  ::v-deep .block-header__content {
    max-width: 47.7rem;
  }
}
</style>