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
              <div class="about-values__item-title fz-h3" v-if="item.post_title" v-html="item.post_title"></div>
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
.about-values__block-header {
  margin-bottom: 4rem;
}

.about-values__list {
  display: flex;
  align-items: flex-start;
}

.about-values__item {
  --width: 37.9rem;

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
  margin-right: -10.6rem;

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
  }
}
</style>

На каждом этапе проекта — от постановки цели до бизнес-результата