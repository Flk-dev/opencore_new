<template>
  <div class="modal__form">
    <div class="form__grid">
      <FormInput
          name="name"
          placeholder="Ваше имя"
          v-model="form.name"
          :value="form.name"
      />
      <FormInput
          name="company"
          placeholder="Компания"
          v-model="form.company"
          :value="form.company"
      />
    </div>
    <div class="form__grid">
      <FormInput
          name="phone"
          placeholder="Телефон"
          v-model="form.phone"
          :value="form.phone"
      />
      <FormInput
          name="email"
          placeholder="Электронная почта"
          v-model="form.email"
          :value="form.email"
      />
    </div>

    <FormTextarea
        name="theme"
        placeholder="Предпочтительная тема/формат мероприятия: «Лекция», «Мастер-класс», «Конференция», «Дискуссионная панель»"
        v-model="form.theme"
        :value="form.theme"
    />

    <FormInput
        name="comment"
        placeholder="Пожелания по формату или содержанию мероприятия"
        v-model="form.comment"
        :value="form.comment"
    />
  </div>

  <ModalsComponentsFooter />
</template>

<script setup lang="ts">
const form = ref({
  name: '',
  company: '',
  phone: '',
  email: '',
  theme: '',
  comment: '',
})
</script>

<style scoped lang="scss">

</style>