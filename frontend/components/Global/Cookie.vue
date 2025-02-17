<template>
  <div class="cookie" :class="{ '_hide': ! isOpen }">
    <div class="cookie__container container">
      <div class="cookie__block">
        <div class="cookie__text fz-body">
          Наш сайт использует куки. Продолжая им&nbsp;пользоваться,<br> вы соглашаетесь с&nbsp;<NuxtLink to="/policy-cookie/">условиями использования.</NuxtLink>
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
  --bottom: 2rem;
  --translate: calc( 100% + var(--bottom));

  position: fixed;
  bottom: var(--bottom);
  left: 0;
  width: 91%;
  max-width: 100%;
  z-index: 998;
  transform: translateY(var(--translate));
  transition: transform .3s, opacity 3s;

  &._hide {
    transform: translateY(var(--translate)) !important;
  }

  &__container {
    padding-right: 0;

    @media (max-width: $tablet) {
      padding-right: var(--p-container);
    }
  }

  @media (max-width: $tablet) {
    width: 100%;
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