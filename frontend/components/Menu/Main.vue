<template>
  <div class="menu">
    <div class="menu__contacts">
      <MenuContacts />
      <GlobalSocials />
    </div>
    <div class="menu__list">
      <div class="menu__list">
        <div class="menu__item" v-for="item in post.menu" :key="item.id" :data-title="item.title">
          <NuxtLink :to="item.url" class="menu__link" v-if="item.content" @click="close">{{ item.title }}</NuxtLink>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
import { Swiper, SwiperSlide } from 'swiper/vue';
import 'swiper/css';

const { result: post } = await useApi( '/menu/header/', {}, 'menu/header' );

const slider = ref(null);
const onSwiper = (swiper) => {
  slider.value = swiper;
};

const beforeElm = ref(null);
const afterElm = ref(null);

onMounted(() => {
  //console.log( slider.value.activeIndex );
});

// const beforeElm = ref(null);
// const afterElm = ref(null);
//
// onMounted(() => {
//   const onSwiper = (swiper: any) => swiper;
//   console.log( swiper );
// });
//
// const countBefore = () => {
//   console.log( swiper );
// }

const close = () => {
  const body = document.querySelector( 'body' );
  body.classList.remove( 'menu--open', '_lock' );
};

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
}

.menu--open .menu {
  opacity: 1;
  transform: translateX(0);
  z-index: 999;
}

.menu__contacts {
  position: absolute;
  bottom: 2rem;
  left: 2rem;

  @media (max-width: $mobile) {
    bottom: auto;
    left: 1.5rem;
    top: 9.1rem;

    :deep(.c-contacts__item) {
      margin-bottom: .5rem !important;
      line-height: 110%;

      &:last-child {
        margin-bottom: 0 !important;
      }
    }

    :deep(.c-contacts__link) {
      font-size: 1rem;
      line-height: 110%;

    }
  }

  :deep(.c-contacts__item) {
    margin-bottom: .5rem;

    &:last-child {
      margin-bottom: 0;
    }
  }

  :deep(.c-contacts__link) {
    &._email {
      text-decoration: underline;
    }
  }
}

.menu__contacts-socials {
  margin-top: 2rem;

  @media (max-width: $mobile) {
    margin-top: 1rem;

    & .socials__item:not(:last-child){
      margin-right: 1rem;
    }

    & .socials__link {
      width: 2.4rem;
      height: 2.4rem;

      & svg {
        max-width: 1.3rem;
      }
    }
  }
}

.menu__contacts-contacts {
  text-align: left;
  margin-bottom: 2rem;
}

.menu__link {
  display: block;
  font-family: var(--ff-atyp);
  font-size: 3rem;
  font-weight: 400;
  font-style: italic;
  color: var(--fg-white-50);
  line-height: 100%;
  text-transform: uppercase;
  transition: var(--tr-regular);

  //@media (max-width: $tablet) {
  //  font-size: 8.8rem;
  //}
  //
  @media (max-width: $mobile) {
    font-size: 2.4rem;
  }

  &:hover {
    color: var(--fg-white);
  }
}

.menu__list .swiper-slide-active .menu__link {
  color: var(--fg-white);
  font-style: normal;
}

.menu__list {
  position: absolute;
  top: 0;
  right: 28rem;
  height: 100%;
  --p-top: 6.3rem;
  padding-top: var(--p-top);

  @media (max-width: $tablet) {
    right: auto;
    left: 0;
    padding-left: var(--p-container);
  }
}

.menu__contacts {
  @media (max-width: $tablet) {
    display: none !important;
  }
}

.menu__data-before {
  & svg {
    max-height: 7.699rem;
    width: auto;

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
}

.menu__data-before,
.menu__data-after {
  position: absolute;
}

.menu__data-after {
  left: calc( 100% + 1rem );
  @media (max-width: $tablet) {
    display: none;
  }
}

.menu__data-before {
  right: calc( 100% + 1rem );
  width: 27.9rem;
  height: 10.6rem;

  @media (max-width: $tablet) {
    width: 22.7rem;
    height: 62.25rem;
  }

  @media (max-width: $mobile) {
    width: 8.8rem;
    height: 3.1rem;
  }
}
</style>