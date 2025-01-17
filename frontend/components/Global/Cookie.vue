<template>
  <div class="cookie" :class="{ '_hide': ! isOpen }">
    <div class="cookie__container container">
      <div class="cookie__block">
        <div class="cookie__text fz-body">
          Наш сайт использует куки. Продолжая им пользоваться,<br> вы соглашаетесь с&nbsp;<a href="#">условиями использования.</a>
        </div>
        <div class="cookie__actions">
          <button class="cookie__actions-btn cookie__submit fz-link" @click="submit">Принять</button>
          <button class="cookie__actions-btn cookie__reject fz-link" @click="close">Отклонить</button>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
const isOpen = ref( false );
const cookie = useCookie('is_cookie');

if (  ! cookie || cookie.value === undefined ) {
  isOpen.value = true;
}

const submit = () => {
  cookie.value = 'true';

  close();
};

const close = () => {
  isOpen.value = false;
};
</script>

<style scoped lang="scss">
.cookie {
  position: fixed;
  bottom: 2rem;
  left: 0;
  width: 100%;
  z-index: 999;
  transition: transform .4s, opacity 3s;

  &._hide {
    transform: translateY(100%);
    opacity: 0;
  }
}

.cookie__block {
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 2rem 1.5rem;
  border-radius: 2rem;
  background: rgba(232, 232, 234, .7);
  backdrop-filter: blur(4.6rem);
  width: 100%;

  @media (max-width: $tablet) {
    flex-direction: column;
    align-items: flex-start;
  }
}

.cookie__text {
  max-width: 85.3rem;

  & a {
    color: var(--fg-blue);
    text-decoration: underline;
  }

  @media (max-width: $tablet) {
    font-size: var(--fz-caption);
    line-height: var(--lh-caption);
    margin-bottom: 1.5rem;
  }

  @media (max-width: $mobile) {
    max-width: 75%;

    & br {
      display: none;
    }
  }
}

.cookie__actions {
  display: flex;
  align-items: center;

  @media (max-width: $tablet) {
    width: 100%;
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 1rem;
  }
}

.cookie__actions-btn {
  padding: .7rem 1rem;
  border-radius: 1rem;
  background: var(--fg-white);
  color: var(--fg-blue);
  margin-right: 1rem;

  &:last-child {
    margin-right: 0;
  }

  @media (max-width: $tablet) {
    width: 100%;
    margin-right: 0;
  }

  @media (max-width: $mobile) {
    padding-top: .5rem;
    padding-bottom: .5rem;
  }
}
</style>