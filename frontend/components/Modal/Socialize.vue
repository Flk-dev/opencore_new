<template>
  <UIFormInput name="name" placeholder="Ваше имя" />
  <UIFormInput name="company" placeholder="Название компании" />
  <div class="form__grid">
    <UIFormInput name="phone" type="tel" placeholder="Телефон" />
    <UIFormInput name="email" type="email" placeholder="Почта" />
  </div>
  <UIFormFile name="email" type="email" placeholder="Почта" />
  <UIFormTextarea name="comment" placeholder="Расскажите кратко о задаче" />
</template>

<script setup lang="ts">

</script>

<style scoped lang="scss">

</style>