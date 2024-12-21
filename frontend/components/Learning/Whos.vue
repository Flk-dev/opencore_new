<template>
<div class="learning__whos learning-whos">
  <div class="learning-whos__flex">
    <BlockHeader :title="data.title" classes="learning-whos" />
    <div class="learning-whos__list accordion">

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
  justify-content: space-between;
}
</style>