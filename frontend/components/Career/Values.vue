<template>
  <div class="career__values career-values">
    <div class="career-values__container container">
      <GlobalBlockHeader :title="data.title" classes="career-values" class-title="fz-h1--tablet"/>
      <div class="career-values__block" v-if="data.list">
        <div class="career-values__round">
          <div class="career-values__item" v-for="(item, key ) in data.list" :class="'career-values__item--'+key">
            <div class="career-values__item-content">
              <h3 class="career-values__item-title fz-h4--tablet fz-h2--mobile">{{ item.title }}</h3>
              <div class="career-values__item-text content__text" v-if="item.text" v-html="item.text"></div>
            </div>
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
    list: object,
  }
}>();

</script>

<style scoped lang="scss">

.career-values {
  margin-top: var(--mt-content-block);
}

.career-values__block-header {
  margin-bottom: 4rem;

  @media (max-width: $mobile) {
    margin-bottom: 3rem;
  }
}

.career-values__block {
  padding: 7.6rem 0 7.4rem;
  background: var(--fg-blue);
  color: var(--fg-white);
  border-radius: var(--br-regular);

  @media (max-width: $tablet) {
    padding: 1.1rem 0;
  }

  @media (max-width: $mobile) {
    margin: 0 var(--m-m-container);
    padding: 2rem 0;
  }
}

.career-values__round {
  border-radius: 50%;
  border: .15rem solid var(--fg-white);
  display: flex;
  flex-direction: column;
  align-items: center;
  padding: 4rem 0;

  @media (max-width: $tablet) {
    padding: 1rem 0;
  }

  @media (max-width: $mobile) {
    padding: 0;
    border: none;
    border-radius: 0;
  }
}

.career-values__item {
  border-radius: 50%;
  border: .15rem solid var(--fg-white);
  width: 87.5rem;
  max-width: 100%;
  height: 23.7rem;
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;

  @media (max-width: $tablet) {
    width: 40.7rem;
    height: 14.1rem;
  }

  &--1,
  &--3 {
    width: 128.5rem;
    height: 27.7rem;

    @media (max-width: $tablet) {
      width: 65.2rem;
      height: 14.1rem;
    }

    @media (max-width: $mobile) {
      width: 100% !important;
    }
  }

  &--2 {
    width: 100%;
    height: 27.2rem;

    @media (max-width: $tablet) {
      height: 14.1rem;
    }

    @media (max-width: $mobile) {
      width: 100% !important;
    }
  }

  @media (max-width: $mobile) {
    height: 14.2rem;
    width: 31.6rem;
    padding-left: 2.8rem;
    padding-right: 2.8rem;
  }
}

.career-values__item-content {
  max-width: 51rem;
  margin: 0 auto;
  text-align: center;
}

.career-values__item-title {
  margin-bottom: 1.7rem;

  @media (max-width: $tablet) {
    margin-bottom: 1rem;
  }
}

.career-values__item-text {
  --fz: var(--fz-body-b);
  --lh: var(--lh-body-b);
  color: var(--fg-white-75);

  @media (max-width: $tablet) {
    --fz: 1.2rem;
    --lh: 1.2rem;
    max-width: 31.4rem;
  }
}

</style>