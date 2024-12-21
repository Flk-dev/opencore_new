<template>
<div class="learning__whos learning-whos">
  <div class="learning-whos__flex">
    <BlockHeader :title="data.title" classes="learning-whos" />
    <div class="learning-whos__list accordion" v-if="data.list.length">
      <AccordionItem
          v-for="(item, key) in data.list"
          :key="key"
          :title="item.title"
          :text="item.text"
      />
    </div>
  </div>
</div>
</template>

<script setup lang="ts">
defineProps<{
  data: {
    title: string,
    list: object
  }
}>();

</script>

<style scoped lang="scss">
.learning-whos__flex {
  display: flex;
  align-items: flex-start;
  justify-content: space-between;
}

.learning-whos__list {
  width: 76.6rem;
  max-width: 100%;
}
</style>