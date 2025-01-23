<template>
  <div class="callback" :class="{ '_active': isOpen }">
    <div class="callback__block">
      <div class="callback__block-top">
        <div class="callback__title fz-h3 fz-h1--mobile">Давайте общаться</div>
        <div class="callback__form form">
          <div class="callback__form-white">
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
            <FormInput
                name="phone"
                placeholder="Телефон или почта"
                v-model="form.phone"
                :value="form.phone"
            />
            <FormInput
                name="comment"
                placeholder="Расскажите кратко о задаче"
                v-model="form.comment"
                :value="form.comment"
            />
          </div>
          <div class="form__button">
            <UIButton title="Отправить" class="btn--white" />
          </div>
        </div>
      </div>
      <div class="callback__block-bottom">
        <GlobalSocials class="callback__socials" />
        <GlobalContacts class="callback__contacts" />
      </div>
      <button @close="" class="callback__close callback--close" @click="close">
        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M8.50276 12.3076L1.49895 19.3114L1.12107 18.9336L8.12489 11.9298C9.0163 11.0383 9.0163 9.59307 8.12488 8.70166L1.18036 1.75714L1.57596 1.36154L8.52049 8.30606C9.4119 9.19747 10.8572 9.19747 11.7486 8.30606L18.6883 1.36638L19.0661 1.74426L12.1265 8.68394C11.235 9.57535 11.235 11.0206 12.1265 11.912L19.1432 18.9287L18.7475 19.3243L11.7309 12.3076C10.8394 11.4162 9.39418 11.4162 8.50276 12.3076Z" fill="#0000FF" stroke="#0000FF" stroke-width="0.9375"></path>
        </svg>
      </button>
    </div>
    <div class="callback__bg callback--close" @click="close"></div>
  </div>
</template>

<script setup lang="ts">
defineProps<{
  isOpen?: boolean
}>();

const emit = defineEmits( [ 'close' ] );

const form = ref({
  name: '',
  email: '',
  phone: '',
  comment: '',
});

const close = () => {
  emit( 'close' );
}

</script>

<style scoped lang="scss">

</style>