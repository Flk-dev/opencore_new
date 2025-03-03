<template>
  <div class="menu">
    <div class="menu__contacts">
      <MenuContacts />
      <GlobalSocials />
    </div>
    <div class="menu__wrap">
      <div class="menu__before" ref="before">
        <svg width="280" height="77" viewBox="0 0 280 77" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M11.2628 65.6107C3.75427 58.2362 0 49.1633 0 38.3474C0 27.5762 3.75427 18.5033 11.2628 11.0841C18.7714 3.7096 28.0677 0 39.1517 0C50.2358 0 59.5321 3.7096 67.0406 11.0841C74.5492 18.4586 78.3034 27.5315 78.3034 38.3474C78.3034 49.1186 74.5492 58.1915 67.0406 65.6107C59.5321 72.9852 50.2358 76.6948 39.1517 76.6948C28.0677 76.6501 18.7714 72.9852 11.2628 65.6107ZM22.481 21.0061C17.9669 25.699 15.7322 31.4645 15.7322 38.3474C15.7322 45.2303 17.9669 50.9958 22.481 55.6886C26.995 60.3815 32.537 62.7056 39.1517 62.7056C45.8111 62.7056 51.3978 60.3815 55.8672 55.6886C60.3366 50.9958 62.5712 45.2303 62.5712 38.3474C62.5712 31.4645 60.3366 25.699 55.8672 21.0061C51.3978 16.3133 45.8111 13.9892 39.1517 13.9892C32.537 13.9892 26.995 16.3133 22.481 21.0061Z" fill="white"/>
          <path d="M102.892 75.5383H87.6958V1.07812H119.205C127.339 1.07812 133.954 3.40221 139.004 8.09508C144.055 12.7879 146.557 18.7322 146.557 25.9727C146.557 33.2131 144.055 39.1127 139.049 43.6715C134.043 48.2303 127.429 50.5543 119.205 50.5543H102.936V75.5383H102.892ZM102.892 14.5757V37.0121H119.16C122.646 37.0121 125.417 35.9841 127.563 33.8835C129.708 31.7829 130.736 29.1012 130.736 25.8386C130.736 22.5759 129.663 19.8943 127.563 17.749C125.417 15.6037 122.646 14.5757 119.16 14.5757H102.892Z" fill="white"/>
          <path d="M203.14 75.5383H153.53V1.07812H203.14V14.5757H168.77V31.6041H202.067V45.0123H168.77V62.0407H203.14V75.5383Z" fill="white"/>
          <path d="M264.727 72.2756V1.07812H279.923V75.5829H250.335L228.569 4.34079V75.5383H213.374V1.07812H242.871L264.727 72.2756Z" fill="white"/>
        </svg>
        <svg width="89" height="32" viewBox="0 0 89 32" fill="none" xmlns="http://www.w3.org/2000/svg" class="_mobile">
          <path d="M4.49067 26.7087C1.49689 23.7067 0 20.0134 0 15.6104C0 11.2257 1.49689 7.5323 4.49067 4.51211C7.48445 1.5101 11.191 0 15.6104 0C20.0298 0 23.7364 1.5101 26.7302 4.51211C29.724 7.51411 31.2209 11.2075 31.2209 15.6104C31.2209 19.9952 29.724 23.6886 26.7302 26.7087C23.7364 29.7108 20.0298 31.2209 15.6104 31.2209C11.191 31.2027 7.48445 29.7108 4.49067 26.7087ZM8.96352 8.55117C7.16369 10.4615 6.27268 12.8086 6.27268 15.6104C6.27268 18.4123 7.16369 20.7593 8.96352 22.6697C10.7634 24.5801 12.973 25.5261 15.6104 25.5261C18.2656 25.5261 20.4931 24.5801 22.2752 22.6697C24.0572 20.7593 24.9482 18.4123 24.9482 15.6104C24.9482 12.8086 24.0572 10.4615 22.2752 8.55117C20.4931 6.6408 18.2656 5.69471 15.6104 5.69471C12.973 5.69471 10.7634 6.6408 8.96352 8.55117Z" fill="white"/>
          <path d="M40.9589 29.4864H34.6899V0H47.6888C51.0445 0 53.7733 0.920342 55.8568 2.77873C57.9403 4.63711 58.9728 6.99106 58.9728 9.85828C58.9728 12.7255 57.9403 15.0618 55.8752 16.8671C53.8102 18.6723 51.0814 19.5927 47.6888 19.5927H40.9773V29.4864H40.9589ZM40.9589 5.34507V14.2299H47.6703C49.1085 14.2299 50.2516 13.8228 51.1367 12.991C52.0217 12.1591 52.4458 11.0972 52.4458 9.80519C52.4458 8.51317 52.0033 7.45124 51.1367 6.60169C50.2516 5.75214 49.1085 5.34507 47.6703 5.34507H40.9589Z" fill="white"/>
          <path d="M82.5179 28.1774V0H88.4588V29.4864H76.8916L68.3822 1.29124V29.4687H62.4414V0H73.9736L82.5179 28.1774Z" fill="white"/>
        </svg>

        <span class="fz-headline"></span>
      </div>
      <div 
        class="menu__list" 
        ref="navbar"
        @mousewheel="handleMouseWheel"
        @touchstart="handleTouchStart"
        @touchmove="handleTouchMove"
        @touchend="handleTouchEnd"
        @mousedown="handleTouchStart"
        @mousemove="handleTouchMove"
        @mouseleave="handleTouchEnd"
        @mouseup="handleTouchEnd"
        @selectstart="() => false"
      >
        <div
          v-for="link in links"
          class="menu__item"
          ref="navLink"
        >
          <NuxtLink
            class="menu__link"
            :to="link.href"
            @click="close"
            @dragstart.prevent
          >
            <div class="menu__title">{{ link.title }}</div>
            <div class="menu__subtitle">{{ link.ru }}</div>
          </NuxtLink>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
import { gsap } from "gsap";
import { ScrollTrigger } from "gsap/ScrollTrigger";

gsap.registerPlugin(ScrollTrigger);
ScrollTrigger.defaults({
  markers: false
});

const links = ref( [
  { href: '/about', title: 'About', ru: 'О компании' },
  { href: '/blog/', title: 'Blog', ru: 'Блог' },
  { href: '/cases/', title: 'Cases', ru: 'Кейсы' },
  { href: '/contacts/', title: 'Contacts', ru: 'Контакты' },
  { href: '/services/', title: 'Services', ru: 'Услуги' },
  { href: '/learning/', title: 'Education', ru: 'Обучение' },
  { href: '/reviews/', title: 'Reviews', ru: 'Отзывы' },
  { href: '/methodology/', title: 'Research', ru: 'Методология' },
  { href: '/career/', title: 'Career', ru: 'Карьера' },
  { href: '/partners/', title: 'Partners', ru: 'Партнерам' },
  { href: '/about', title: 'About', ru: 'О компании' },
  { href: '/blog/', title: 'Blog', ru: 'Блог' },
  { href: '/cases/', title: 'Cases', ru: 'Кейсы' },
  { href: '/contacts/', title: 'Contacts', ru: 'Контакты' },
  { href: '/services/', title: 'Services', ru: 'Услуги' },
  { href: '/learning/', title: 'Education', ru: 'Обучение' },
  { href: '/reviews/', title: 'Reviews', ru: 'Отзывы' },
  { href: '/methodology/', title: 'Research', ru: 'Методология' },
  { href: '/career/', title: 'Career', ru: 'Карьера' },
  { href: '/partners/', title: 'Partners', ru: 'Партнерам' },
] );

const navbar = ref( null )
const navLink = ref( null )
const currentIndex = ref( 0 );
const isDragging = ref( false );

const { height: menuHeight } = useElementSize( navbar );
const { height: itemHeight } = useElementSize( navLink );

let scrollSpeed = 0;
let	oldScrollY = 0;
let	scrollY = 0;
let	y = 0

let touchStart = 0;
let	touchY = 0;

const dispose = (scroll) => {
  const wrapHeight = navLink.value.length * itemHeight.value;

  gsap.set(navLink.value, {
    duration: 30,
    y: (i) => {
      return i * itemHeight.value + scroll + 15;
    },
    modifiers: {
      y: (y) => {
        const s = gsap.utils.wrap(
          -itemHeight.value,
          wrapHeight - itemHeight.value,
          parseInt(y)
        )
        return `${s}px`
      }
    }
  })
}

const lerp = (number0, number1, time) => {
  return number0 * (1 - time) + number1 * time
}

const render = () => {
  requestAnimationFrame(render)

  y = lerp(y * 0.9, (scrollY), 0.1);

  dispose(y)

  scrollSpeed = y - oldScrollY
  oldScrollY = y;
}

const handleMouseWheel = (e) => {
  let direction;
  if (e.deltaY < 0) {
      direction = 1;
      currentIndex.value--;
      if (currentIndex.value < 0) {
          currentIndex.value = navLink.value.length - 1;
      }
  } else {
      direction = -1;
      currentIndex.value++;
      if (currentIndex.value > navLink.value.length - 1) {
          currentIndex.value = 0;
      }
  }

  scrollY -= e.deltaY;
}

const handleTouchStart = (e) => {
		touchStart = e.clientY || e.touches[0].clientY
		isDragging.value = true
	}

	const handleTouchMove = (e) => {
		if(!isDragging.value) return
		touchY = e.clientY || e.touches[0].clientY
		scrollY += (touchY - touchStart) * 3
		touchStart = touchY
	}

	const handleTouchEnd = () => {
		isDragging.value = false
	}

  const close = () => {
    document.body.classList.remove('menu--open', '_lock')
  }

onMounted( () => {
	dispose(0)
	render();
} );

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
  padding: 5.3rem 2rem 0;
  color: var(--fg-white);
  transition: var(--tr-regular);
  transition-delay: .1s;
  opacity: 0;
  transform: translateY(-100%);

  $root: &;

  @media (max-width: $mobile) {
    padding: 0 1.5rem 0 2rem;
  }

  &__wrap {
    position: absolute;
    right: 0;
    width: 60%;

    @media (max-width: $tablet) {
      width: 68%;
    }
  }

  &__list {
    height: 100vh;
    overflow: hidden;
    list-style-type: none;

    @media (max-width: $tablet) {
      right: 1rem;
    }

    & .swiper-slide-active .menu__link {
      color: var(--fg-white);
      font-style: normal;
    }
  }

  &__item {
    position: absolute;
    width: 100%;  
    display: flex;
    align-items: flex-start;

    @media (any-hover: hover) {
      &:hover {
         & .menu__title {
          opacity: 1;
          transform: translateX(0);
         }

        & .menu__link {
          color: var(--fg-white);
        }
      }
    }
  }

  &__link {
    display: flex;
    align-items: flex-start;
    position: relative;

    @media (any-hover: hover) {
      &:hover {
        #{$root}__subtitle {
          transform: translateX(0);
          opacity: 1;
        }

        #{$root}__title {
          color: var(--fg-white);
        }
      }
    }
  }

  &__title {
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

  &__subtitle {
    transform: translateX(-100%);
    opacity: 0;
    position: absolute;
    left: calc(100% + 1rem);
    top: 2rem;
    transition: all .3s;
  }

  &__before,
  &__after {
    position: absolute;
    opacity: 1;
  }

  &__before {
    display: flex;
    max-height: fit-content;
    right: calc( 100% + 1rem );
    width: 27.9rem;
    top: 50%;
    transform: translateY(calc( -50% - 5.3rem ));

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

    @media (max-width: $mobile) {
      width: auto;
      right: calc(100% + 1rem);
      width: 8.8rem;
      transform: translateY(-50%);
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

    @media (max-width: $mobile) {
      bottom: auto;
      top: 7.7rem;

      :deep( .short-contacts__item ) {
        margin-bottom: .5rem;
        line-height: 1rem;
      }

      :deep( .short-contacts__link ) {
        font-size: 1rem;
        line-height: 1rem;

        &::before {
          display: none;
        }
      }

      :deep(.socials) {
        margin-top: 1rem;;
      }

      :deep(.socials__item) {
        margin-right: 1rem;
      }

      :deep(.socials__link) {
        width: 2.4rem;
        height: 2.4rem;

        & svg {
          max-width: 50%;
        }
      }
    }
  }
}

.menu--open .menu {
  opacity: 1;
  transform: translateX(0);
  z-index: 999;
}

</style>