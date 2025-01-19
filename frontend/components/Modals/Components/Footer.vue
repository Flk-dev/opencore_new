<template>
  <UIButton
      :title="title"
      class="btn--white modal__submit"
  />
  <div class="modal__policy">
    Отправляя форму, вы подтверждаете согласие на обработку ваших <a href="#">персональных данных.</a>
  </div>
</template>

<script setup lang="ts">
withDefaults(defineProps<{
  title?: string,
}>(), {
  title: 'Отправить',
});

</script>

<style scoped lang="scss">

</style>