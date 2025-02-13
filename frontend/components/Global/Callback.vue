<template>
  <div class="callback" :class="{ 'callback--active': isOpen }">
    <div class="callback__content">
      <div class="callback__overflow">
        <div class="callback__header modal__header">
          <div class="modal__header-flex">
            <div class="modal__title fz-h3 fz-h1--mobile">Давайте общаться</div>
            <button class="modal__close" @click="close">
              <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M8.50276 12.3076L1.49895 19.3114L1.12107 18.9336L8.12489 11.9298C9.0163 11.0383 9.0163 9.59307 8.12488 8.70166L1.18036 1.75714L1.57596 1.36154L8.52049 8.30606C9.4119 9.19747 10.8572 9.19747 11.7486 8.30606L18.6883 1.36638L19.0661 1.74426L12.1265 8.68394C11.235 9.57535 11.235 11.0206 12.1265 11.912L19.1432 18.9287L18.7475 19.3243L11.7309 12.3076C10.8394 11.4162 9.39418 11.4162 8.50276 12.3076Z" fill="#0000FF" stroke="#0000FF" stroke-width="0.9375"/>
              </svg>
            </button>
          </div>
        </div>
        <div class="callback__form form">
          <div class="callback__form-white" ref="whiteBlock">
            <PerfectScrollbar
                class="callback__form-overflow"
                @ps-scroll-down="onScrollEvent( $event, 'down' )"
                @ps-scroll-up="onScrollEvent( $event, 'up' )"
            >
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
                    placeholder="Телефон"
                    v-model="form.phone"
                    :value="form.phone"
                />
              <FormInput
                  name="phone"
                  placeholder="Почта"
                  v-model="form.email"
                  :value="form.email"
              />
                <FormInput
                    name="comment"
                    placeholder="Расскажите кратко о задаче"
                    v-model="form.comment"
                    :value="form.comment"
                />
                <FormFile
                    name="file"
                    label="Прикрепите файл"
                    v-model="form.file"
                    :value="form.file"
                />
              </PerfectScrollbar>
            </div>
          <div class="form__button">
            <UIButton title="Отправить" class="btn--white" />
          </div>
        </div>
        <div class="callback__bottom">
          <GlobalSocials class="callback__socials" />
          <GlobalContacts class="callback__contacts" />
        </div>
      </div>
    </div>
    <div class="callback__bg"></div>
  </div>
</template>

<script setup lang="ts">
import Button from "~/components/Blog/Content/Button.vue";

defineProps<{
  isOpen?: boolean
}>();

const emit = defineEmits( [ 'close' ] );

const form = ref({
  company: '',
  name: '',
  email: '',
  phone: '',
  comment: '',
  file: '',
});

const whiteBlock = ref( null );

const close = () => {
  emit( 'close' );
}

const onScrollEvent = (event, action) => {
  if ( action == 'down' ) {
    whiteBlock.value.classList.add('_active');
  } else {
    whiteBlock.value.classList.remove('_active');
  }
}

</script>

<style scoped lang="scss">
.callback {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  transition: var(--tr-regular);
  z-index: -1;

  &--active {
    z-index: 9999;

    .callback__bg {
      opacity: 1;
    }

    .callback__content {
      transform: translateX(0);
    }
  }

  &__bg {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: var(--fg-black-75);
    transition: var(--tr-regular);
    opacity: 0;
  }

  &__content {
    position: fixed;
    right: 0;
    top: 0;
    height: 100%;
    width: 70rem;
    max-width: 100%;
    background: var(--fg-blue);
    z-index: 5;
    border-radius: var(--br-regular) 0 0 var(--br-regular);
    color: var(--fg-white);
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    transform: translateX(101%);
    transition: var(--tr-regular);

    @media (max-width: $tablet) {
      width: 100%;
      border-radius: 0;
    }
  }

  &__overflow {
    overflow-y: auto;
    padding: 3rem;
  }

  &__form {
    &-overflow {
      padding: 1rem 4rem 3rem;
      background: var(--fg-white);
      border-radius: var(--br-regular);
      max-height: 42.5rem;
      position: relative;
      overflow: hidden;
    }

    &-white {
      position: relative;
      overflow: hidden;
      border-radius: var(--br-regular);

      &:after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        width: 100%;
        height: 9.6rem;
        background: linear-gradient(0deg, #fff 40.5%, rgba(255, 255, 255, 0) 100%);
      }

      &._active {
        &:after {
          opacity: 0;
        }
      }

      :deep(.form__file) {
        margin-bottom: 0;
      }
    }
  }

  &__bottom {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-top: 2.3rem;

    @media (max-width: $mobile) {
      margin-top: 10.2rem;
    }
  }

  &__contacts {
    text-align: right;
  }
}

:deep(.ps__rail-y){
  width: 1.5px;
  background: var(--fg-gray);
  opacity: 1 !important;
  right: 1rem;
  max-height: 40.5rem !important;
}

:deep(.ps__thumb-y) {
  width: 1.5px !important;
  background: var(--fg-blue) !important;
  right: 0 !important;
}
</style>