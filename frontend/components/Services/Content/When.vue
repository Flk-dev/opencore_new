<template>
  <div class="service-when" v-if="data.list.length" :class="{ '_blue': data.is_blue }">
    <div class="service__container container">
      <BlockHeader :title="data.title" classes="service-when" />
      <div class="service-when__grid">
        <div class="service-when__item" v-for="(item, key) in data.list" :key="key">
          <h4 class="service-when__item-title fz-h4" v-if="item.title" v-html="item.title"></h4>
          <ContentText :text="item.text" class="service-when__item-text" />
        </div>
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
defineProps<{
  data: {
    title?: string,
    list?: object,
    is_blue: boolean
  }
}>();
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
}

.service-when__grid {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: 2rem;
}

.service-when__item {
  border-radius: var(--br-regular);
  border: .15rem solid var(--fg-blue);
  min-height: 30rem;
  display: flex;
  flex-direction: column;
  justify-content: space-between;
  padding: 2rem;
}

.service-when__item-title {
  color: var(--fg-blue);
}

.service-when__item-text {
  --fz: var(--fz-body-b);
  --lh: var(--fz-body-b);
}

</style>