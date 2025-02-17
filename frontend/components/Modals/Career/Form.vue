<template>
    <div class="modal__form">
      <FormInput
          name="name"
          placeholder="Ваше имя"
          v-model="form.name"
          :value="form.name"
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
          name="resume"
          label="Прикрепите резюме"
          v-model="form.file"
          :value="form.file"
      />
  
      <FormInput
          name="comment"
          placeholder="Расскажите о вашем опыте"
          v-model="form.comment"
          :value="form.comment"
      />
    </div>
  
    <ModalsComponentsFooter />
  </template>
  
  <script setup lang="ts">
  const form = reactive({
    name: '',
    phone: '',
    email: '',
    file: '',
    comment: '',
  })
  </script>
  
  <style scoped lang="scss">
  
  </style>