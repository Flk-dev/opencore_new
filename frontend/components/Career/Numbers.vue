<template>
  <div class="career__numbers career-numbers">
    <div class="career-numbers__container container">
      <h2 class="career-numbers__title fz-h2 fz-h1--tablet" v-html="data.title"></h2>
      <div class="career-numbers__list" v-if="data.list.length">
        <div class="career-numbers__item" v-for="(item, key) in data.list" :key="key">
          <div class="career-numbers__item-main">
            <div class="career-numbers__item-number fz-h2 fz-h3--tablet fz-h1--mobile" v-if="item.number">{{ item.number }}</div>
            <div class="career-numbers__item-subtitle fz-h4 fz-h1--mobile" v-if="item.subtitle" v-html="item.subtitle"></div>
          </div>
          <div class="career-numbers__item-text fz-body" v-if="item.text" v-html="item.text"></div>
        </div>
      </div>
      <div class="career-numbers__button" v-if="data.button && data.button_link">
        <UIButton
          :title="data.button"
          :to="data.button_link"
        />
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
  border-top: 1.5px solid var(--fg-blue);
  margin-bottom: 6rem;

  @media (max-width: $tablet) {
    margin-bottom: 3rem;
  }

  @media (max-width: $mobile) {
   flex-direction: column;
    padding: 2rem 0;
    margin-bottom: 3rem;
  }

  &:last-child {
    margin-bottom: 0;
  }
}

.career-numbers__item-main {
  @media (max-width: $mobile) {
    display: flex;
    align-items: center;
    color: var(--fg-blue);
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

  @media (max-width: $mobile) {
    margin-top: 0;
    margin-left: .5rem;
  }
}

.career-numbers__item-text {
  min-width: 34.1rem;
  max-width: 34.1rem;

  @media (max-width: $mobile) {
    margin-top: 1rem;
  }
}

.career-numbers__button {
  margin-top: 17.7rem;

  @media (max-width: $tablet) {
    margin-top: 5rem;
  }
}

</style>