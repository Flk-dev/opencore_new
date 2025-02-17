<template>
  <UIButton
      :title="title"
      class="btn--white modal__submit"
  />
  <div class="modal__policy">
    Отправляя форму, вы подтверждаете согласие на&nbsp;обработку ваших
    <NuxtLink to="/privacy-policy/" @click="modal.close()">персональных данных.</NuxtLink>
  </div>
</template>

<script setup lang="ts">
withDefaults(defineProps<{
  title?: string,
}>(), {
  title: 'Отправить',
});

const modal = useModal();
</script>

<style scoped lang="scss">

</style>