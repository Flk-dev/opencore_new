<template>
  <header 
    class="header" 
    ref="headerRef"
    :class="{
      'header--white': isWhite,
      'header--hide': isHide
    }"
  >
    <div class="header__container container">
      <NuxtLink to="/" class="header__logo logo" :class="route.path == '/' ? 'header__logo--home' : ''">
        <div class="logo__pc">
          <svg width="1400" height="186" viewBox="0 0 1400 186" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M27.2239 158.59C9.07463 140.765 0 118.834 0 92.6909C0 66.6553 9.07463 44.725 27.2239 26.7918C45.3732 8.9666 67.8437 0 94.6355 0C121.427 0 143.898 8.9666 162.047 26.7918C180.196 44.6169 189.271 66.5473 189.271 92.6909C189.271 118.726 180.196 140.657 162.047 158.59C143.898 176.415 121.427 185.382 94.6355 185.382C67.8437 185.274 45.3732 176.415 27.2239 158.59ZM54.3398 50.7747C43.4286 62.118 38.027 76.054 38.027 92.6909C38.027 109.328 43.4286 123.264 54.3398 134.607C65.2509 145.95 78.6468 151.568 94.6355 151.568C110.732 151.568 124.236 145.95 135.039 134.607C145.842 123.264 151.244 109.328 151.244 92.6909C151.244 76.054 145.842 62.118 135.039 50.7747C124.236 39.4314 110.732 33.8138 94.6355 33.8138C78.6468 33.8138 65.2509 39.4314 54.3398 50.7747Z" fill="#0000FF"/>
            <path d="M248.699 182.683H211.969V2.70312H288.131C307.793 2.70312 323.781 8.32075 335.989 19.664C348.196 31.0073 354.246 45.3755 354.246 62.8766C354.246 80.3777 348.196 94.6378 336.097 105.657C323.997 116.676 308.009 122.294 288.131 122.294H248.807V182.683H248.699ZM248.699 35.3286V89.5603H288.023C296.449 89.5603 303.147 87.0756 308.333 81.9982C313.518 76.9207 316.003 70.4388 316.003 62.5525C316.003 54.6662 313.41 48.1843 308.333 42.9988C303.147 37.8133 296.449 35.3286 288.023 35.3286H248.699Z" fill="#0000FF"/>
            <path d="M491.016 182.683H371.102V2.70312H491.016V35.3286H407.94V76.4885H488.424V108.898H407.94V150.058H491.016V182.683Z" fill="#0000FF"/>
            <path d="M639.878 174.797V2.70312H676.609V182.791H605.092L552.481 10.5894V182.683H515.75V2.70312H587.051L639.878 174.797Z" fill="#0000FF"/>
            <path d="M700.609 110.193C700.609 81.0248 711.845 55.4214 734.207 33.275C756.57 11.1286 782.497 0.109375 811.99 0.109375C831.219 0.109375 847.424 4.97078 860.604 14.6936C873.784 24.4164 882.642 36.732 887.072 51.8564L867.518 59.3105C864.385 47.103 857.903 37.2721 847.856 29.818C837.809 22.3638 825.602 18.5827 811.234 18.5827C787.359 18.5827 766.401 27.7654 748.359 46.0227C730.318 64.28 721.243 85.3461 721.243 109.221C721.243 126.074 726.645 139.794 737.448 150.597C748.251 161.4 762.403 166.802 779.904 166.802C794.273 166.802 808.101 163.021 821.28 155.566C834.46 148.112 845.155 138.281 853.474 126.074L871.515 134.284C861.576 149.085 848.396 161.184 832.192 170.799C815.879 180.414 798.27 185.167 779.256 185.167C756.246 185.167 737.448 178.145 722.756 164.209C707.956 150.381 700.609 132.34 700.609 110.193Z" fill="#0000FF"/>
            <path d="M897.07 110.193C897.07 81.0248 908.306 55.4214 930.668 33.275C953.031 11.1286 978.958 0.109375 1008.45 0.109375C1031.46 0.109375 1050.26 7.1314 1064.95 21.0674C1079.64 35.0035 1086.99 53.0447 1086.99 75.1911C1086.99 104.36 1075.75 129.963 1053.39 152.109C1031.03 174.256 1005.1 185.275 975.609 185.275C952.599 185.275 933.801 178.253 919.109 164.317C904.416 150.381 897.07 132.34 897.07 110.193ZM917.704 109.113C917.704 125.966 923.106 139.686 933.909 150.489C944.712 161.292 958.864 166.694 976.365 166.694C1000.24 166.694 1021.2 157.511 1039.24 139.254C1057.28 120.996 1066.36 99.9303 1066.36 76.0554C1066.36 59.2025 1060.95 45.4825 1050.15 34.6794C1039.35 23.8763 1025.2 18.4747 1007.69 18.4747C983.82 18.4747 962.861 27.6573 944.82 45.9146C926.671 64.28 917.704 85.3461 917.704 109.113Z" fill="#0000FF"/>
            <path d="M1249.51 45.5902C1249.51 62.011 1243.68 76.055 1232.01 87.5064C1220.34 98.9577 1205.65 105.44 1187.72 106.844L1225.74 182.682H1203.38L1165.57 107.06H1130.03L1114.04 182.682H1093.95L1132.3 2.59375H1199.71C1214.62 2.59375 1226.61 6.59091 1235.68 14.6933C1244.97 22.7956 1249.51 33.0586 1249.51 45.5902ZM1134.02 88.3706H1183.94C1197.01 88.3706 1207.81 84.2654 1216.34 76.1631C1224.88 68.0607 1229.2 58.3379 1229.2 47.2107C1229.2 39.5405 1226.5 33.1666 1220.99 28.3052C1215.48 23.4438 1207.92 20.9591 1198.3 20.9591H1148.61L1134.02 88.3706Z" fill="#0000FF"/>
            <path d="M1361.65 182.682H1251.02L1289.37 2.59375H1400L1396.11 20.851H1305.58L1291.97 83.6172H1380.23L1376.34 101.658H1288.08L1275.01 164.425H1365.54L1361.65 182.682Z" fill="#0000FF"/>
          </svg>
        </div>

        <div class="logo__mobile">
          <svg width="87" height="18" viewBox="0 0 87 18" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M2.58904 15.3986C0.863014 13.6678 0 11.5385 0 9C0 6.47203 0.863014 4.34266 2.58904 2.6014C4.31507 0.87063 6.45206 0 9 0C11.5479 0 13.6849 0.87063 15.411 2.6014C17.137 4.33217 18 6.46154 18 9C18 11.528 17.137 13.6573 15.411 15.3986C13.6849 17.1294 11.5479 18 9 18C6.45206 17.9895 4.31507 17.1294 2.58904 15.3986ZM5.16781 4.93007C4.13014 6.03147 3.61644 7.38462 3.61644 9C3.61644 10.6154 4.13014 11.9685 5.16781 13.0699C6.20548 14.1713 7.47945 14.7168 9 14.7168C10.5308 14.7168 11.8151 14.1713 12.8425 13.0699C13.8699 11.9685 14.3836 10.6154 14.3836 9C14.3836 7.38462 13.8699 6.03147 12.8425 4.93007C11.8151 3.82867 10.5308 3.28322 9 3.28322C7.47945 3.28322 6.20548 3.82867 5.16781 4.93007Z" fill="#0000FF"/>
            <path d="M23.6143 17H20V0H27.4943C29.429 0 31.0023 0.530612 32.2035 1.60204C33.4047 2.67347 34 4.03061 34 5.68367C34 7.33673 33.4047 8.68367 32.2141 9.72449C31.0235 10.7653 29.4503 11.2959 27.4943 11.2959H23.6249V17H23.6143ZM23.6143 3.08163V8.20408H27.4837C28.3128 8.20408 28.9719 7.96939 29.4822 7.4898C29.9924 7.01021 30.2369 6.39796 30.2369 5.65306C30.2369 4.90816 29.9818 4.29592 29.4822 3.80612C28.9719 3.31633 28.3128 3.08163 27.4837 3.08163H23.6143Z" fill="#0000FF"/>
            <path d="M47.5749 16.2454V0H51V17H44.3311L39.4251 0.744451V16.9898H36V0H42.6488L47.5749 16.2454Z" fill="#0000FF"/>
            <path d="M54 10.7075C54 7.8704 55.0846 5.38003 57.2433 3.22592C59.4021 1.0718 61.905 0 64.752 0C66.6083 0 68.1727 0.472855 69.445 1.41856C70.7173 2.36427 71.5724 3.56217 72 5.03327L70.1124 5.75832C69.81 4.57093 69.1842 3.61471 68.2144 2.88967C67.2445 2.16462 66.066 1.79685 64.679 1.79685C62.3743 1.79685 60.3511 2.69002 58.6095 4.46585C56.8679 6.24168 55.9919 8.29072 55.9919 10.613C55.9919 12.2522 56.5133 13.5867 57.5562 14.6375C58.5991 15.6883 59.9652 16.2137 61.6547 16.2137C63.0417 16.2137 64.3766 15.8459 65.6489 15.1208C66.9212 14.3958 67.9537 13.4396 68.7567 12.2522L70.4983 13.0508C69.5388 14.4904 68.2665 15.6672 66.7022 16.6024C65.1275 17.5377 63.4276 18 61.5921 18C59.3708 18 57.5562 17.317 56.1379 15.9615C54.7092 14.6165 54 12.8616 54 10.7075Z" fill="#0000FF"/>
            <path d="M87 4.05879C87 5.60888 86.4375 6.93461 85.3125 8.0156C84.1875 9.09658 82.7708 9.70846 81.0417 9.84103L84.7083 17H82.5521L78.9062 9.86143H75.4792L73.9375 17H72L75.6979 0H82.1979C83.6354 0 84.7917 0.377324 85.6667 1.14217C86.5625 1.90702 87 2.87582 87 4.05879ZM75.8646 8.09718H80.6771C81.9375 8.09718 82.9792 7.70966 83.8021 6.94481C84.625 6.17996 85.0417 5.26215 85.0417 4.21176C85.0417 3.4877 84.7812 2.88602 84.25 2.42711C83.7187 1.96821 82.9896 1.73365 82.0625 1.73365H77.2708L75.8646 8.09718Z" fill="#0000FF"/>
          </svg>
        </div>
      </NuxtLink>
      <button class="header__burger burger" @click="openMenu">
        <span class="burger__line"></span>
        <span class="burger__line"></span>
        <span class="burger__line"></span>
      </button>
      <UIButton title="Связаться <span>с нами</span>" class="header__button" :class="{ 'btn--white-fill': isWhite ? isWhite : false }" @click="toggleCallback" />
    </div>
  </header>

  <MenuMain />
  <GlobalCallback :is-open="isOpen" @close="toggleCallback" />
</template>

<script setup lang="ts">
import { useHeader } from '~/stores/header';
import { storeToRefs } from 'pinia'

defineProps<{
  isWhite?: boolean
}>();

const openMenu = () => {
  const body = document.body;

  if ( body.classList.contains( 'menu--open' ) ) {
    body.classList.remove( '_lock', 'menu--open' );

    return;
  }

  body.classList.add( '_lock', 'menu--open' );
}

const headerRef  = ref( null );
const { height } = useElementBounding( headerRef );

const header = useHeader();
const { isHide } = storeToRefs(header);

onMounted(() => {
  setHeight();

  window.addEventListener('resize', ( event: any ) => {
    setHeight();
  });

  window.addEventListener('scroll', ( event: any ) => {
    header.scroll( event );
  });
});

const setHeight = () => {
  header.$patch({ headerHeight: height.value });
}

const isOpen = ref( false );
const toggleCallback = () => {
  const body = document.body;
  body.classList.toggle( '_lock' );
  isOpen.value = ! isOpen.value;
}

const route = useRoute();
</script>

<style scoped lang="scss">
.header {
  position: sticky;
  top: 0;
  left: 0;
  width: 100%;
  padding: .5rem 0 .4rem;
  z-index: 1000;
  transition: var(--tr-regular);
  background-color: var(--fg-white);
  transform: translateY(-100%);

  &._fixed {
    background: var(--fg-white);
  }

  @media (max-width: $tablet) {
    padding: 1.7rem 0;
  }

  &--white {
    background: none;

    :deep(.burger__line) {
      border-color: var(--fg-white);
    }

    &._fixed {
      background: none;
    }

    & .header__logo {
      opacity: 0;
    }
  }

  &--hide {
    transform: translateY(-100%) !important;
  }
}

.header__container {
  display: flex;
  align-items: center;
  justify-content: space-between;
}

.header__burger {
  max-width: 4.2rem;

  @media (max-width: $tablet) {
    max-width: 2.7rem;
  }
}

.header__button {
  padding: 1.05rem 2rem 1.15rem;
  font-size: var(--fz-caption);
  line-height: var(--lh-caption);
  letter-spacing: var(--lc-caption);
  background: var(--fg-blue);
  color: var(--fg-white);
  border-radius: 1rem;
  transition: var(--tr-regular);
  max-width: 18rem;

  &:hover {
    color: var(--fg-blue);
  }

  &:before {
    background: var(--fg-white);
  }

  &:before {
    transition: width .5s, height .5s;
  }

  &.btn--white-fill {
    background: none;

    &:before {
      background: var(--fg-blue);
    }
  }

  @media (max-width: $tablet) {
    padding: .6rem 1rem .8rem;
    max-width: fit-content;
  }

  @media (max-width: $mobile) {
    :deep( span > span ) {
      display: none;
    }
  }
}

.header__logo {
  & .logo__mobile {
    display: none;
  }

  &--home {
    opacity: 0;
  }

  @media (max-width: $mobile) {
    & .logo__pc {
      display: none;
    }

    & .logo__mobile {
      display: block;
    }
  }
}

.header__logo svg {
  max-width: 17.7rem;
  height: 2.3rem;
}

.header__logo {
  position: absolute;
  left: 50%;
  transform: translateX(-50%);

  & svg {
    width: 100%;
  }

  & path {
    transition: var(--tr-regular);
  }

  & .logo__pc {
    & svg {
      min-width: 17.7rem;
    }
  }
  
  @media (max-width: $tablet) {
    position: relative;
    left: 0;
    transform: translateX(0);
  }
}

.menu--open {
  & .header {
    background: var(--fg-blue);
  }

  & .header__button {
    background: var(--fg-white);
    color: var(--fg-blue);
  }

  & .header__logo {
    opacity: 1 !important;

    & path {
      fill: var(--fg-white);
    }
  }
}

//.menu--open {
//  & .header__logo {
//    opacity: 1;
//    z-index: 10;
//  }
//
//  & .header__burger .burger__line {
//    background: var(--fg-white);
//
//    &:not(:nth-child(2)){
//      opacity: 0;
//    }
//  }
//
//  & .header__button {
//    background: var(--fg-white);
//    color: var(--fg-blue);
//  }
//}

</style>