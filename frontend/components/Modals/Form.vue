<template>
  <div class="modal__form">
    <slot name="form" />
  </div>
  <UIButton title="Отправить" class="_white modal__submit" />
  <div class="modal__policy">
    Отправляя форму, вы подтверждаете согласие на обработку ваших <a href="#">персональных данных.</a>
  </div>
</template>

<script setup lang="ts">

</script>

<style scoped lang="scss">

</style>