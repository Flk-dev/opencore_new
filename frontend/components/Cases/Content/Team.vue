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
    list: Array<{
      name: string,
      text: string
    }>
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

  @media (max-width: $tablet) {
    grid-template-columns: repeat(2, 1fr);
    column-gap: 2fr;
    row-gap: 4rem;
  }

  @media (max-width: $mobile) {
    grid-template-columns: 1fr;
    row-gap: 3rem;
  }
}

.case-team__title {
  margin-bottom: 8rem;

  @media (max-width: $tablet) {
    margin-bottom: 6rem;
  }

  @media (max-width: $mobile) {
    margin-bottom: 4rem;
  }
}

.case-team__item-post {
  margin-top: .5rem;
  color: var(--fg-blue);
  line-height: 140%;
}
</style>