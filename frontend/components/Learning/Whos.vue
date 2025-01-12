<template>
<div class="learning__whos learning-whos">
  <div class="learning__container container">
    <div class="learning-whos__flex">
      <GlobalBlockHeader :title="data.title" classes="learning-whos" class-title="fz-h1--tablet fz-h1--mobile" />
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

  @media (max-width: $tablet) {
    flex-direction: column;
  }
}

.learning-whos__block-header {
  @media (max-width: $tablet) {
    margin-bottom: 4rem;
  }

  @media (max-width: $mobile) {
    margin-bottom: 3rem;
  }
}

.learning-whos__list {
  width: 76.6rem;
  max-width: 100%;
}
</style>