<template>
<div class="learning__we learning-we" v-if="data.list.length">
  <div class="learning__container container">
    <div class="learning-we__block">
      <GlobalBlockHeader :title="data.title" class-title="fz-h1--tablet" />
      <div class="learning-we__content">
        <div class="learning-we__list">
          <div class="learning-we__item" v-for="(item, key) in data.list">
            <div class="learning-we__item-counter fz-h3">{{ getFormatNumber( (key + 1) ) }}</div>
            <div class="learning-we__item-text fz-h3 fz-h2--mobile" v-html="item.text"></div>
          </div>
        </div>
        <div class="learning-we__media" v-if="data.image">
          <picture class="learning-we__media-pic">
            <img :src="data.image" :alt="data.title">
          </picture>
        </div>
      </div>
    </div>
  </div>
</div>
</template>

<script setup lang="ts">
defineProps<{
  data: {
    image?: string,
    title: string,
    list: object
  }
}>();

</script>

<style scoped lang="scss">
.learning-we__block {
  padding: 3rem 3rem 6rem;
  background: var(--fg-blue);
  color: var(--fg-white);
  border-radius: var(--br-regular);
}

.learning-we__content {
  display: flex;
  align-items: flex-start;
  justify-content: space-between;

  @media (max-width: $tablet) {
    flex-direction: column;
  }
}

.learning-we__list {
  max-width: 73.2rem;

  @media (max-width: $tablet) {
    order: 2;
  }
}

.learning-we__item {
  display: flex;
  align-items: flex-start;
  padding: 2rem 0;
  border-top: 1.5px solid var(--fg-white);
  margin-bottom: 4rem;

  &:last-child {
    margin-bottom: 0;
  }
}

.learning-we__media {
  @media (max-width: $tablet) {
    order: 1;
    max-width: 52rem;
    margin: 0 auto 6rem;
  }
}

.learning-we__item-counter {
  min-width: 12.5rem;

  @media (max-width: $mobile) {
    display: none;
  }
}

</style>