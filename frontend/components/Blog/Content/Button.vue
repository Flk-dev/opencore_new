<template>
  <div class="container">
    <UIButton
        :title="data.button"
        class="article__button"
        @click="modal.open( ModalsMain, {
          title: 'Давайте общаться'
        } )"
    />
  </div>
</template>

<script setup lang="ts">
import {ModalsMain} from "#components";

defineProps<{
  data: {
    button: string,
    type: string,
    link?: string
  }
}>();

const modal = useModal();
</script>

<style scoped lang="scss">
.article__button {
  margin-top: 18rem;

  @media (max-width: $mobile) {
    margin-top: 12rem;
  }
}
</style>