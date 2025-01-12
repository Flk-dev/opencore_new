<template>
   <div class="modal" id="default" :class="{ 'modal--open' : isOpen }" ref="modal">
    <div class="modal__content" ref="modalContent">
      <div class="modal__header">
        <div class="modal__header-flex">
          <div class="modal__title fz-h3" v-html="title"></div>
          <button class="modal__close" @click="close">
            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M8.50276 12.3076L1.49895 19.3114L1.12107 18.9336L8.12489 11.9298C9.0163 11.0383 9.0163 9.59307 8.12488 8.70166L1.18036 1.75714L1.57596 1.36154L8.52049 8.30606C9.4119 9.19747 10.8572 9.19747 11.7486 8.30606L18.6883 1.36638L19.0661 1.74426L12.1265 8.68394C11.235 9.57535 11.235 11.0206 12.1265 11.912L19.1432 18.9287L18.7475 19.3243L11.7309 12.3076C10.8394 11.4162 9.39418 11.4162 8.50276 12.3076Z" fill="#0000FF" stroke="#0000FF" stroke-width="0.9375"/>
            </svg>
          </button>
        </div>
        <div class="modal__text fz-body" v-if="text" v-html="text"></div>
      </div>
      <div class="form">
        <div class="modal__form">
          <slot />
        </div>
        <UIButton title="Отправить" class="btn--ripple _white modal__submit" />
        <div class="modal__policy">
          Отправляя форму, вы подтверждаете согласие на обработку ваших <a href="#">персональных данных.</a>
        </div>
      </div>
    </div>
    <div class="modal__bg"></div>
   </div>
</template>

<script setup lang="ts">
defineProps<{
  title?: string,
  text?: string,
  isOpen?: boolean
}>();

const isOpen = ref( false );
const modal = ref('');
const modalContent = ref('');

onMounted( () => {
    if (modalContent.value.getBoundingClientRect().height > window.innerHeight) {
      modal.value.classList.add('modal--scollable')
  }
} );

const close = () => {
  isOpen.value = !isOpen.value;
}

</script>

<style scoped lang="scss">
.modal {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  z-index: 999;
  display: flex;
  align-items: center;
  justify-content: center;
  transform: translateY(-100%);
  opacity: 0;
  transition: var(--tr-regular);

  &--scollable {
    overflow-y: auto;
    padding: 3rem 0;
    align-items: flex-start;
  }

  &--open {
    transform: translateY(0);
    opacity: 1;
  }
}

.modal__bg {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background: var(--fg-black-75);
}

.modal__content {
  width: 90rem;
  max-width: 100%;
  padding: 3rem;
  background: var(--fg-blue);
  position: relative;
  z-index: 10;
  border-radius: var(--br-regular);
}

.modal__header {
  color: var(--fg-white);
  margin-bottom: 3rem;
}

.modal__header-flex {
  display: flex;
  align-items: flex-start;
  justify-content: space-between;
}

.modal__close {
  display: flex;
  align-items: center;
  justify-content: center;
  width: 4.5rem;
  height: 4.5rem;
  border-radius: 50%;
  border: .1rem solid var(--fg-blue);
  background: var(--fg-white);
}

.modal__form {
  padding: 1rem 4rem 4rem;
  background: var(--fg-white);
  border-radius: var(--br-regular);
}

.modal__submit {
  margin-top: 3rem;
}

.modal__policy {
  margin-top: 1rem;
  color: var(--fg-white);
  font-size: 1.2rem;
  line-height: 110%;

  & a {
    text-decoration: underline;
    color: var(--fg-white);
  }
}

.modal__text {
  max-width: 74.2rem;
  margin: 2rem 0 0;
  color: var(--fg-white);
}
</style>