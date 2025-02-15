<template>
  <div
      class="service-when"
      v-if="data.list"
      :class="{ '_blue': data.is_blue }"
      ref="services"
  >
    <div class="service__container container">
      <GlobalBlockHeader :title="data.title" classes="service-when" class-title="fz-h1--tablet" />
      <div class="service-when__grid">
        <div class="service-when__item" v-for="(item, key) in data.list" :key="key">
          <h4 class="service-when__item-title fz-h4 fz-h2--mobile" v-if="item.title" v-html="item.title"></h4>
          <ContentText v-if="item.text" :text="fixText(item.text)" class="service-when__item-text" />
        </div>
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
defineProps<{
  data: {
    title?: string,
    list?: Array<{
      title?: string,
      text?: string
    }>,
    is_blue: boolean
  }
}>();
const services = ref(null);
</script>

<style scoped lang="scss">
.service-when {
  margin-top: var(--mt-content-block);

  &._blue {
    & .service-when__item {
      background: var(--fg-blue);
      color: var(--fg-white);
    }

    & .service-when__item-title {
      color: var(--fg-white);
    }
  }
}

.service-when__block-header {
  margin-bottom: var(--mb-block-header-third);

  @media (max-width: $mobile) {
    margin-bottom: 4rem;
  }
}

.service-when__grid {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: 2rem;

  @media (max-width: $tablet) {
    grid-template-columns: repeat(2, 1fr);
  }

  @media (max-width: $mobile) {
    grid-template-columns: 1fr;
    gap: 1rem;
  }
}

.service-when__item {
  border-radius: var(--br-regular);
  border: 1.5px solid var(--fg-blue);
  min-height: 30rem;
  display: flex;
  flex-direction: column;
  justify-content: space-between;
  padding: 2rem;

  @media (max-width: $mobile) {
    min-height: 19rem;
  }
}

.service-when__item-title {
  color: var(--fg-blue);
}

.service-when__item-text {
  --fz: var(--fz-body-b);
  --lh: var(--fz-body-b);

  @media (max-width: $tablet) {
    --fz: var(--fz-caption);
    --lh: var(--lh-caption);
  }

  @media (max-width: $mobile) {
    --fz: var(--fz-body-b);
    --lh: var(--fz-body-b);
  }
}

</style>