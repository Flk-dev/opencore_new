<template>
<div class="modal" ref="modal">
  <div class="modal__content">
    <div class="modal__header">
      <div class="modal__title fz-h3" v-if="title">{{ title }}</div>
      <button class="modal__close">
        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M8.50276 12.3076L1.49895 19.3114L1.12107 18.9336L8.12489 11.9298C9.0163 11.0383 9.0163 9.59307 8.12488 8.70166L1.18036 1.75714L1.57596 1.36154L8.52049 8.30606C9.4119 9.19747 10.8572 9.19747 11.7486 8.30606L18.6883 1.36638L19.0661 1.74426L12.1265 8.68394C11.235 9.57535 11.235 11.0206 12.1265 11.912L19.1432 18.9287L18.7475 19.3243L11.7309 12.3076C10.8394 11.4162 9.39418 11.4162 8.50276 12.3076Z" fill="#0000FF" stroke="#0000FF" stroke-width="0.9375"/>
        </svg>
      </button>
    </div>
    <div class="modal__form">
      <slot />
    </div>
    <div class="modal__actions">
      <UIButton class="modal__btn _white" title="Отправить" />
      <div class="modal__policy">
        Отправляя форму, вы подтверждаете согласие на обработку ваших <a href="#">персональных данных</a>.
      </div>
    </div>
  </div>
  <div class="modal__bg"></div>
</div>
</template>

<script setup lang="ts">
defineProps<{
  title: string,
  component: string
}>();

const modal = ref( null );
onMounted(() => {

});

</script>

<style scoped lang="scss">
.modal {
  display: none;
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  z-index: 9999;
  align-items: center;
  justify-content: center;
}

.modal__bg {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background: rgba(0,0,0,.7);
}

.modal__content {
  background: var(--fg-blue);
  padding: 3rem;
  border-radius: var(--br-regular);
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  z-index: 5;
  width: 90rem;
  max-width: 100%;
}

.modal__header {
  display: flex;
  align-items: flex-start;
  justify-content: space-between;
  margin-bottom: 3rem;
}

.modal__title {
  color: var(--fg-white);
}

.modal__close {
  display: flex;
  align-items: center;
  justify-content: center;
  width: 4.5rem;
  height: 4.5rem;
  border-radius: 50%;
  background-color: var(--fg-white);
}

.modal__form {
  border-radius: var(--br-regular);
  background-color: var(--fg-white);
  padding: 1rem 4rem 4rem;
}

.modal__actions {
  margin-top: 3rem;
}

.modal__policy {
  margin-top: 1rem;
  font-size: 1.2rem;
  line-height: 110%;
  color: var(--fg-white);

  & a {
    color: var(--fg-white);
    text-decoration: underline;
  }
}

</style>