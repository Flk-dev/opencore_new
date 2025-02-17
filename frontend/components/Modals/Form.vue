<template>
  <div class="modal__form">
    <slot name="form" />
  </div>
  <UIButton title="Отправить" class="_white modal__submit" />
  <div class="modal__policy">
    Отправляя форму, вы подтверждаете согласие на&nbsp;обработку ваших <NuxtLink to="/privacy-policy/" @click="modal.close()">персональных данных.</NuxtLink>
  </div>
</template>

<script setup lang="ts">
const modal = useModal();
</script>

<style scoped lang="scss">

</style>