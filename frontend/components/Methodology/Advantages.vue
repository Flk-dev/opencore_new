<template>
  <div class="methodology__advantages methodology-advantages" v-if="data.list.length">
    <div class="container">
      <GlobalBlockHeader :title="data.title" classes="methodology-advantages" class-title="fz-h1" />
      <div class="methodology-advantages__grid">
        <div class="methodology-advantages__item" v-for="(item, key) in data.list" :key="key">
          <div class="methodology-advantages__item-icon" v-if="item.icon">
            <img :src="item.icon" alt="">
          </div>
          <div class="methodology-advantages__item-title fz-h3 fz-h4--tablet fz-h2--mobile" v-if="item.title" v-html="item.title"></div>
          <ContentText :text="item.text" class="methodology-advantages__item-text" />
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
.methodology-advantages__block-header {
  max-width: 92.2rem;
  margin-bottom: var(--mt-content-third);

  @media (max-width: $tablet) {
    margin-bottom: 10rem;
  }
}

.methodology-advantages__grid {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: 4.8rem;

  @media (max-width: $tablet) {
    grid-template-columns: repeat(2, 1fr);
    row-gap: 5.1rem;
    column-gap: 4.4rem;
  }

  @media (max-width: $mobile) {
    grid-template-columns: 1fr;
    row-gap: 6rem;
  }
}

.methodology-advantages__item-icon {
  margin-bottom: 3rem;

  @media (max-width: $mobile) {
    & img {
      max-width: 25%;
    }

    margin-bottom: 2rem;
  }
}

.methodology-advantages__item-title {
  margin-bottom: 3rem;
  
  @media (max-width: $mobile) {
    margin-bottom:  0;

    & :deep(br) {
      display: none;
    }
  }
}

.methodology-advantages__item-text {
  color: var(--fg-gray-2);
  --fz: 2.2rem;
  --lh: 120%;
  margin-top: 3rem;

  @media (max-width: $tablet) {
    --fz: var(--fz-caption);
    --lh: var(--lh-caption);

    :deep(br) {
      display: none;
    }
  }

  @media (max-width: $mobile) {
    margin-top: 1.5rem;
    --fz: var(--fz-body-b);
    --lh: var(--lh-body-b);

    :deep(br) {
      display: none;
    }
  }
}
</style>