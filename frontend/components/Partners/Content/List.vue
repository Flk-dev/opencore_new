<template>
  <div class="partner__list partner-list">
    <div class="partner-list__container container">
      <div class="partner-list__col" :class="{ 'partners-list__col--empty': data.title ? false : true }">
        <h2
            class="partner-list__title fz-h2 fz-h1--tablet fz-h1--mobile animate animate__fadeIn"
            :class="{ '_empty': ! data.title ? true : false }"
            v-if="data.title"
            v-animate
        >
          <span class="_up" v-html="fixText(data.title)"></span>
        </h2>
      </div>
      <div class="partner-list__row" v-if="data.list.length">
        <div class="partner-list__item" v-for="(item, key) in data.list">
          <div class="partner-list__item-number fz-h4 fz-h2--mobile">{{getCounter( key + 1 ) }}</div>
          <div class="partner-list__item-text fz-h4 fz-h2--mobile" v-html="fixText(item.text)">

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
    list: Array<{
      text?: string
    }>
  },
}>();

let counter = 1;

const getCounter = ( counter: number ) => {
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

.partner-list__title {
  margin-top: -.95rem;
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

  @media (max-width: $mobile) {
    :deep(br) {
      display: none;
    }
  }
}

.partner-list__col {
  @media (max-width: $tablet) {
    &--empty {
      display: none;
    }
  }
}

</style>