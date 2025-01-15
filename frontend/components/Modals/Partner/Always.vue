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
        name="service"
        placeholder="Тип услуг: «Графический дизайн», «Маркетинговые исследования», «Разработка сайтов» и т.д."
        v-model="form.service"
        :value="form.service"
    />

    <FormInput
        name="experience"
        placeholder="Опыт работы"
        v-model="form.experience"
        :value="form.experience"
    />

    <FormInput
        name="links"
        placeholder="Ссылки на проекты"
        v-model="form.links"
        :value="form.links"
    />

    <FormInput
        name="price"
        placeholder="Ставка"
        v-model="form.price"
        :value="form.price"
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
  service: '',
  experience: '',
  links: '',
  price: '',
})
</script>

<style scoped lang="scss">

</style>