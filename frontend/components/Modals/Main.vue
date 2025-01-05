<template>
  <FormInput
      name="name"
      placeholder="Ваше имя"
      v-model="form.name"
      :value="form.name"
  />
  <FormInput
      name="company"
      placeholder="Название компании"
      v-model="form.company"
      :value="form.company"
  />
  <div class="form__grid">
    <FormInput
        name="phone"
        placeholder="Телефон"
        v-model="form.phone"
        :value="form.phone"
    />
    <FormInput
        name="email"
        placeholder="Почта"
        v-model="form.email"
        :value="form.email"
    />
  </div>

  <FormFile
      name="file"
      label="Прикрепите файл"
      v-model="form.file"
      :value="form.file"
  />

  <FormTextarea
      name="comment"
      placeholder="Расскажите кратко о задаче"
      v-model="form.comment"
      :value="form.comment"
  />
</template>

<script setup lang="ts">
const form = reactive({
  name: '',
  company: '',
  phone: '',
  email: '',
  file: '',
  comment: '',
})
</script>

<style scoped lang="scss">

</style>