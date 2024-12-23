<template>
  <div class="learning__format learning-format" v-if="data.list.length">
    <div class="learning-format__col" v-for="item in data.list">
      <BlockHeader :title="item.title"  classes="learning-format" />
      <div :class="{ 'learning-format__item': true, '_blue': item.is_blue }">
        <h3 class="learning-format__item-title fz-h3" v-if="item.subtitle" v-html="item.subtitle"></h3>
        <div class="learning-format__item-text content__text" v-if="item.text" v-html="item.text"></div>
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
defineProps<{
  data: object
}>();
</script>

<style scoped lang="scss">
.learning-format {
  display: grid;
  grid-template-columns: repeat(2, 1fr);
  gap: 1rem;
}

.learning-format__block-header {
  margin-bottom: 6rem;
}

.learning-format__item {
  padding: 3rem;
  border: .15rem solid var(--fg-blue);
  color: var(--fg-blue);
  height: 100%;
  min-height: 35rem;
  display: flex;
  flex-direction: column;
  justify-content: space-between;
  border-radius: var(--br-regular);

  &._blue {
    color: var(--fg-white);
    background: var(--fg-blue);

    ::v-deep & ul li:before {
      background: var(--fg-white);
    }
  }
}

.learning-format__item-text {
  --fz: var(--fz-body-b);
  --lh: var(--fz-body-b);
}

</style>