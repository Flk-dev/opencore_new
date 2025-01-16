<template>
  <div class="about__values about-values">
    <div class="container">
      <GlobalBlockHeader :title="data.title" classes="about-values" />
      <div class="about-values__list" v-if="data.select">
        <div
            class="about-values__item"
            v-for="item in data.select"
            :key="item.post_id">
            <div class="about-values__item-icon" v-if="item.icon">
              <img :src="item.icon" :alt="item.post_title" />
            </div>
            <div class="about-values__item-content">
              <div class="about-values__item-title fz-h3 fz-h2--mobile" v-if="item.post_title" v-html="item.post_title"></div>
              <div class="about-values__item-text" v-if="item.text" v-html="item.text"></div>
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
    select?: object
  }
}>();
</script>

<style scoped lang="scss">
.about-values {
  @media (max-width: $mobile) {
    padding-bottom: 18rem;
  }
}

.about-values__block-header {
  margin-bottom: 4rem;
}

.about-values__list {
  display: flex;
  align-items: flex-start;

  @media (max-width: $mobile) {
    flex-direction: column;
  }
}

.about-values__item {
  --width: 37.9rem;
  --coef: 13.6rem;

  min-width: var(--width);
  max-width: var(--width);
  background: var(--fg-white);
  border: .1rem solid var(--fg-blue);
  border-radius: var(--br-regular);
  padding: 3rem;
  display: flex;
  flex-direction: column;
  justify-content: space-between;
  min-height: 36rem;
  margin-right: calc( -1 * ((var(--width) - var(--coef)) - var(--coef)));

  &-icon {
    min-height: 10rem;
  }

  &-content {
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    min-height: 10rem;
  }

  &-text {
    font-size: var(--fz-link);
    line-height: 120%;

    @media (max-width: $mobile) {
      font-size: var(--fz-body-b);
      line-height: var(--lh-body-b);
    }
  }
  
  @media (max-width: $tablet) {
    --coef: 4.2rem;
  }

  @media (max-width: $mobile) {
    --coef: 7.6rem;
    --width: 100%;

    margin-right: 0;
    margin-bottom: calc( -1 * ((var(--width) - var(--coef)) - var(--coef)));
    min-height: 26rem;

    & img {
      max-height: 7rem;
    }
  }
}
</style>

На каждом этапе проекта — от постановки цели до бизнес-результата