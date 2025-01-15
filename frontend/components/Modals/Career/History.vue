<template>
  <div class="modal-history__text">
    <ContentText v-if="props.fullText" :text="props.fullText" />
  </div>
</template>

<script setup lang="ts">
const { props } = useModal();
</script>

<style scoped lang="scss">
.modal-history__text {
  max-width: 60rem;
  margin: 0 auto;
}
</style>