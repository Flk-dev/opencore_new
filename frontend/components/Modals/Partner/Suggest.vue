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

    <FormInput
        name="project_name"
        placeholder="Название проекта"
        v-model="form.project.name"
        :value="form.project.name"
    />

    <FormTextarea
        name="project_description"
        placeholder="Описание проекта"
        v-model="form.project.description"
        :value="form.project.description"
    />

    <FormTextarea
        name="project_role"
        placeholder="Ваша роль в проекте: «Основной партнер», «Финансирование», «Ресурсы/Команда» "
        v-model="form.project.role"
        :value="form.project.role"
    />

    <FormInput
        name="project_scope"
        placeholder="Масштаб проекта: «Местный», «национальный», «международный»"
        v-model="form.project.scope"
        :value="form.project.scope"
    />

    <FormTextarea
        name="project_scope"
        placeholder="Ожидаемая роль Opencore, например «Консультирование», «Разработка бренда», «Маркетинговая стратегия» и т.д."
        v-model="form.project.scope"
        :value="form.project.scope"
    />

    <div class="form__grid">
      <FormInput
          name="start"
          placeholder="Дата начала проекта"
          v-model="form.start"
          :value="form.start"
      />
      <FormInput
          name="end"
          placeholder="Дата окончания проекта"
          v-model="form.end"
          :value="form.end"
      />
    </div>

    <FormTextarea
        name="comments"
        placeholder="Дополнительные комментарии"
        v-model="form.comments"
        :value="form.comments"
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
  project: {
    name: '',
    description: '',
    role: '',
    scope: '',
    role_expected: '',
  },
  start: '',
  end: '',
  comments: '',
})
</script>

<style scoped lang="scss">

</style>