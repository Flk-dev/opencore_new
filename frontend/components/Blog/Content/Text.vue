<template>
  <ContentBlock :text="fixText( data.text )" :class="{ 
    'article__block': true, 
    'article__content': true,
    '_big': data.is_big_text ? data.is_big_text : false
  }" />
</template>

<script setup lang="ts">
defineProps<{
  data: {
    is_big_text: boolean,
    text: string,
  }
}>();
</script>

<style scoped lang="scss">
.article__content {
  :deep(.content__text) {
    --m-bottom: 1.5rem;
  }
}
</style>