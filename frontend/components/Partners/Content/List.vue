<template>
  <div class="partner__list partner-list">
    <div class="partner-list__container container">
      <h2 class="partner-list__title fz-h2 fz-h1--mobile" :class="{ '_empty': ! data.title.length ? true : false }">{{ data.title }}</h2>
      <div class="partner-list__row" v-if="data.list.length">
        <div class="partner-list__item" v-for="(item, key) in data.list">
          <div class="partner-list__item-number fz-h4 fz-h2--mobile">{{getCounter( key + 1 ) }}</div>
          <div class="partner-list__item-text fz-h4 fz-h2--mobile" v-html="item.text">

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

  @media (max-width: $tablet) {
    margin-top: var(--mt-content-block);
  }
}

.partner-list__container {
  display: grid;
  grid-template-columns: repeat(2, 1fr);
  gap: 5rem;

  @media (max-width: $tablet) {
    grid-template-columns: 1fr;
    gap: 0;
  }
}

.partner-list__title:not(._empty) {
  @media (max-width: $tablet) {
    margin-bottom: 6rem;
  }

  @media (max-width: $tablet) {
    margin-bottom: 3rem;
  }
}

.partner-list__item {
  padding: 3rem 0;
  border-top: 1.5px solid var(--fg-blue);

  @media (max-width: $mobile) {
    padding: 2rem 0;
  }
}

.partner-list__item-number {
  color: var(--fg-blue);
  font-weight: 600;
  margin-bottom: 1.7rem;

  @media (max-width: $mobile) {
    margin-bottom: 1.3rem;
  }

  @media (max-width: $mobile) {
    margin-bottom: .8rem;
  }
}

.partner-list__item-text {
  font-weight: 600;
}

</style>