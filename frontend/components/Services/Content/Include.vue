<template>
<div class="service-include" v-if="data.list.length">
  <div class="service__container container">
    <GlobalBlockHeader :title="data.title" classes="service-include" :text="fixText( data.text )" class-title="fz-h1--tablet" />
    <div class="service-include__list">
      <div class="service-include__item" v-for="(item, key) in data.list">
        <div class="service-include__item-main">
          <div class="service-include__item-number fz-h3 fz-h1--tablet animate animate__fadeIn" v-animate>
            <span class="_up">{{ getFormatNumber( key + 1 ) }}</span>
          </div>
          <div class="service-include__item-title fz-h2 fz-h1--tablet animate animate__fadeIn" v-animate>
            <span v-html="item.title" class="_up"></span>
          </div>
        </div>
        <div class="service-include__item-list" v-if="item.list.length">
          <div class="service-include__item-value fz-body" v-for="(listItem, listKey) in item.list" :key="listKey">
            <NuxtLink :to="listItem.link">{{ fixText(listItem.text) }}</NuxtLink>
          </div>
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

    @media (max-width: $tablet) {
      max-width: 80%;
    }
  }

  :deep(.block-header__content) {
    max-width: 46.4rem;
    margin-right: .4rem;
    
    @media (max-width: $tablet) {
      margin-top: 1.5rem;
      max-width: 58.3rem;
    }
  }
}

.service-include__item {
  --l-width: 61.3rem;
  --r-width: calc( 100% - var(--l-width) );

  display: flex;
  align-items: flex-start;
  padding: 3rem 0;
  margin-bottom: 9rem;
  border-top: 1.5px solid var(--fg-black);

  &:last-child {
    margin-bottom: 0;
  }

  @media (max-width: $tablet) {
    flex-wrap: wrap;
  }

  @media (max-width: $mobile) {
    padding: 2rem 0;
    margin-bottom: 10rem;
  }
}

.service-include__item-main {
  display: flex;
  width: var(--l-width);
  max-width: 100%;
  margin-right: 7.9rem;

  @media (max-width: $tablet) {
    width: 100%;
    margin-bottom: 6rem;
  }

  @media (max-width: $mobile) {
    margin-bottom: 4rem;
  }
}

.service-include__item-number {
  min-width: 6.5rem;
  color: var(--fg-blue);
  margin-top: .3rem;

  @media (max-width: $tablet) {
    min-width: auto;
    margin-right: 2rem;
  }
}

.service-include__item-title {
  color: var(--fg-blue);
  max-width: 52.4rem;

  @media (max-width: $tablet) {
    max-width: 100%;

    :deep(br) {
      display: none;
    }
  }
}

.service-include__item-list {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  column-gap: 4rem;
  row-gap: 3rem;
  width: var(--r-width);

  @media (max-width: $tablet) {
    width: 100%;
    display: flex;
    flex-wrap: wrap;
  }

  @media (max-width: $mobile) {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
  }
}

.service-include__item-value {
  & a {
    border-bottom: .15rem solid var(--fg-black);
    transition: var(--tr-regular);

    &:hover {
      color: var(--fg-blue);
      border-color: var(--fg-blue);
    }
  }
}

.service-include__btn {
  margin-top: 7rem;
}
</style>