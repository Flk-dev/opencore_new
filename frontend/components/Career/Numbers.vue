<template>
  <div class="career__numbers career-numbers">
    <div class="career-numbers__container container">
      <h2 class="career-numbers__title fz-h2 fz-h1--tablet">{{ data.title }}</h2>
      <div class="career-numbers__list" v-if="data.list.length">
        <div class="career-numbers__item" v-for="(item, key) in data.list" :key="key">
          <div class="career-numbers__item-main">
            <div class="career-numbers__item-number fz-h2 fz-h3--tablet" v-if="item.number">{{ item.number }}</div>
            <div class="career-numbers__item-subtitle fz-h4" v-if="item.subtitle" v-html="item.subtitle"></div>
          </div>
          <div class="career-numbers__item-text fz-body" v-if="item.text" v-html="item.text"></div>
        </div>
      </div>
      <div class="career-numbers__button">
        <NuxtLink v-if="data.button && data.button_link" :to="data.button_link" class="btn btn--ripple">
          <span>{{ data.button }}</span>
        </NuxtLink>
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
defineProps<{
  data: {
    title?: string,
    list: object,
    button?: string,
    button_link?: string,
  }
}>();

</script>

<style scoped lang="scss">
.career-numbers__title {
  max-width: 93.3rem;
  margin-bottom: 5.9rem;
}

.career-numbers__list {
  max-width: 69.9rem;
  margin-left: auto;

  @media (max-width: $tablet) {
    margin-left: 0;
    max-width: 100%;
  }
}

.career-numbers__item {
  display: flex;
  align-items: flex-start;
  justify-content: space-between;
  padding: 3rem 0;
  border-top: .15rem solid var(--fg-blue);
  margin-bottom: 6rem;

  @media (max-width: $tablet) {
    margin-bottom: 3rem;
  }

  &:last-child {
    margin-bottom: 0;
  }
}

.career-numbers__item-number {
  color: var(--fg-blue);
  line-height: 80%;
}

.career-numbers__item-subtitle {
  margin-top: 1.5rem;

  @media (max-width: $tablet) {
    margin-top: 1rem;
  }
}

.career-numbers__item-text {
  min-width: 30.1rem;
  max-width: 30.1rem;
}

.career-numbers__button {
  margin-top: 17.7rem;

  @media (max-width: $tablet) {
    margin-top: 5rem;
  }
}

</style>