<template>
  <div class="menu">
    <div class="menu__contacts">
      <MenuContacts />
      <GlobalSocials />
    </div>
    <div class="menu__list" ref="list">

    </div>
  </div>
</template>

<script setup>
//import { register } from 'swiper/element/bundle';
//register();
//const { result: post } = await useApi( '/menu/header/', {}, 'menu/header' );
/*const close = () => {
  document.querySelector('body').classList.remove( 'menu--open', '_lock' );
}*/
</script>

<style scoped lang="scss">
.menu {
  position: fixed;
  top: 0;
  left: 0;
  background: var(--fg-blue);
  z-index: -1;
  width: 100%;
  height: 100%;
  padding: 7rem 2rem 0;
  color: var(--fg-white);
  transition: var(--tr-regular);
  transition-delay: .1s;
  opacity: 0;
  transform: translateY(-100%);

  @media (max-width: $mobile) {
    padding: 0 1.5rem 0 2rem;
  }

  &__list {
    position: absolute;
    top: 0;
    right: 28rem;
    height: 100%;
    --p-top: 6.3rem;
    padding-top: var(--p-top);

    @media (max-width: $tablet) {
      right: 1rem;
    }

    & .swiper-slide-active .menu__link {
      color: var(--fg-white);
      font-style: normal;
    }
  }

  &__link {
    display: block;
    font-family: var(--ff-atyp);
    font-size: 10.6rem;
    font-weight: 400;
    font-style: italic;
    color: var(--fg-white-50);
    line-height: 100%;
    text-transform: uppercase;
    transition: var(--tr-regular);
    padding: 0 1rem;

    @media (max-width: $tablet) {
      font-size: 8.8rem;
    }

    @media (max-width: $mobile) {
      font-size: 4.4rem;
    }
  }

  &__before,
  &__after {
    position: absolute;
  }

  &__before {
    display: flex;
    max-height: fit-content;
    right: calc( 100% + 1rem );
    width: 27.9rem;

    & svg {
      width: 100%;
      height: auto;

      &._mobile {
        display: none;
      }

      @media (max-width: $mobile) {
        max-height: 3.1rem;

        & {
          display: none;
        }

        &._mobile {
          display: block;
        }
      }
    }

    & span {
      display: none;
      opacity: .5;
      margin-top: 1rem;

      @media (max-width: $tablet) {
        display: block;
      }

      @media (max-width: $mobile) {
        font-size: 1.2rem;
        margin-top: .5rem;
      }
    }

    @media (max-width: $tablet) {
      flex-direction: column;
      width: 22.7rem;
      right: calc(100% - 0.5rem);
    }
  }

  &__after {
    left: calc( 100% + 1rem );
    white-space: nowrap;

    @media (max-width: $tablet) {
      display: none;
    }
  }

  &__contacts {
    position: absolute;
    bottom: 2rem;
    left: 2rem;

    & .socials {
      margin-top: 1.5rem;
    }
  }
}

.menu--open .menu {
  opacity: 1;
  transform: translateX(0);
  z-index: 999;
}

</style>