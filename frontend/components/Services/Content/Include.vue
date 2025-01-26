<template>
<div class="service-include" v-if="data.list.length">
  <div class="service__container container">
    <GlobalBlockHeader :title="data.title" classes="service-include" :text="data.text" />
    <div class="service-include__list">
      <div class="service-include__item" v-for="(item, key) in data.list">
        <div class="service-include__item-main">
          <div class="service-include__item-number fz-h2">{{ getFormatNumber( key + 1 ) }}</div>
          <div class="service-include__item-title fz-h2" v-html="item.title"></div>
        </div>
        <div class="service-include__item-list" v-if="item.list.length">
          <div class="service-include__item-value fz-body" v-for="(listItem, listKey) in item.list" :key="listKey" v-html="listItem.text"></div>
        </div>
      </div>
    </div>
    <UIButton title="Все услуги" class="service-include__btn btn--ripple" />
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

  :deep(.block-header__title) {
    max-width: 60rem;
  }

  :deep(.block-header__content) {
    max-width: 47.7rem;
  }
}

.service-include__item {
  display: flex;
  justify-content: space-between;
  align-items: flex-start;
  padding: 3rem 0;
  margin-bottom: 9rem;
  border-top: 1.5px solid var(--fg-black);

  &:last-child {
    margin-bottom: 0;
  }
}

.service-include__item-main {
  display: flex;
}

.service-include__item-number {
  min-width: 8.9rem;
  color: var(--fg-blue);
}

.service-include__item-title {
  color: var(--fg-blue);
  max-width: 52.4rem;
}

.service-include__item-list {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  column-gap: 4rem;
  row-gap: 3rem;
  max-width: 82rem;
}

.service-include__item-value {
  text-decoration: underline;
}

.service-include__btn {
  margin-top: 7rem;
}
</style>