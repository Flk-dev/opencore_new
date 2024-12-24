<template>
  <div class="partner__list partner-list">
    <div class="partner-list__container container">
      <h2 class="partner-list__title fz-h2">{{ data.title }}</h2>
      <div class="partner-list__row" v-if="data.list.length">
        <div class="partner-list__item" v-for="(item, key) in data.list">
          <div class="partner-list__item-number fz-h4">{{getCounter( key + 1 ) }}</div>
          <div class="partner-list__item-text fz-h4" v-html="item.text">

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
    list?: object
  },
}>();

let counter = 1;

const getCounter = ( counter ) => {
  return ( counter < 10 ? '0' + counter : counter );
};

const upCounter = () => {
  counter++;
};

</script>

<style scoped lang="scss">

.partner__list + .partner__list {
  margin-top: var(--mt-content-block-plus);
}

.partner-list__container {
  display: grid;
  grid-template-columns: repeat(2, 1fr);
  gap: 5rem;
}

.partner-list__item {
  padding: 3rem 0;
  border-top: .15rem solid var(--fg-blue);
}

.partner-list__item-number {
  color: var(--fg-blue);
  font-weight: 600;
  margin-bottom: 1.7rem;
}

.partner-list__item-text {
  font-weight: 600;
}

</style>