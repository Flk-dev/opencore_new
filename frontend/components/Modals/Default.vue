<template>
  <Teleport to="#teleports">
    <div
        class="modal"
        :class="[{
          'modal--open': isOpen,
          'modal--scrollable': isScrollable,
          'modal--white': ( props.isWhite ? true : false ),
          'modal--title-blue': ( props.isBlueTitle ? true : false ),
        }, `modal-w--${( props.width ? props.width : 900 )}`]"
    >
      <div class="modal__bg" @click="modal.close"></div>
      <div class="modal__overflow">
        <div class="modal__content" ref="modalContent">
          <div class="modal__header">
            <div class="modal__header-flex">
              <div class="modal__header-main">
                <div class="modal__title fz-h3" v-html="props.title"></div>
                <div class="modal__text fz-body" v-if="props.text" v-html="props.text"></div>
              </div>
              <button class="modal__close" @click="modal.close">
                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M8.50276 12.3076L1.49895 19.3114L1.12107 18.9336L8.12489 11.9298C9.0163 11.0383 9.0163 9.59307 8.12488 8.70166L1.18036 1.75714L1.57596 1.36154L8.52049 8.30606C9.4119 9.19747 10.8572 9.19747 11.7486 8.30606L18.6883 1.36638L19.0661 1.74426L12.1265 8.68394C11.235 9.57535 11.235 11.0206 12.1265 11.912L19.1432 18.9287L18.7475 19.3243L11.7309 12.3076C10.8394 11.4162 9.39418 11.4162 8.50276 12.3076Z" fill="#0000FF" stroke="#0000FF" stroke-width="0.9375"/>
                </svg>
              </button>
            </div>
          </div>
          <component :is="view" v-model="model"></component>
        </div>
      </div>
    </div>
  </Teleport>
</template>

<script setup lang="ts">
import { storeToRefs } from "pinia";
defineProps<{
  title?: string,
  text?: string,
}>();

const modal = useModal();
const { isOpen, view, props } = storeToRefs(modal);

const isScrollable = ref( true );
const modalContent: any = ref( null );

const model = ref({});

computed( () => {
  if (modalContent.value.getBoundingClientRect().height > window.innerHeight) {
    isScrollable.value = true;
  }
} );
</script>

<style scoped lang="scss">
.modal {
  opacity: 0;
  transform: translateY(-100%);
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  z-index: 9999;

  &--scrollable {
    :deep(.modal__overflow) {
      align-items: flex-start;
    }
  }

  &--open {
    opacity: 1;
    transform: translateY(0);
  }

  &--white {
    & .modal__content {
      background: var(--fg-white);
    }

    & .modal__header {
      color: var(--fg-black);
    }
  }

  &-w--800 {
    & .modal__content {
      width: 80rem;
    }
  }

  &-w--680 {
    & .modal__content {
      width: 68rem;
    }
  }

  &--title-blue {
    & .modal__title {
      color: var(--fg-blue);
    }
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

.modal__overflow {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  overflow-y: auto;
  display: flex;
  align-items: center;
  justify-content: center;
  padding: 2rem 0;
}

.modal__content {
  width: 90rem;
  max-width: 100%;
  background: var(--fg-blue);
  position: relative;
  z-index: 5;
  border-radius: var(--br-regular);
  padding: 3rem;
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
  min-width: 4.5rem;
  height: 4.5rem;
  border-radius: 50%;
  border: .1rem solid var(--fg-blue);
  background: var(--fg-white);
}

:global(.modal__form) {
  padding: 1rem 4rem 4rem;
  background: var(--fg-white);
  border-radius: var(--br-regular);
}

:global(.modal__submit) {
  margin-top: 3rem;
}

:global(.modal__policy) {
  margin-top: 1rem;
  color: var(--fg-white);
  font-size: 1.2rem;
  line-height: 110%;

  & a {
    text-decoration: underline;
    color: var(--fg-white);
  }
}

:global(.modal__text) {
  max-width: 74.2rem;
  margin: 1.5rem 0 0;
}
</style>