<template>
  <section class="hero" ref="section">
    <div class="hero__container container">
      <div class="hero__header">
        <h1 class="hero__title">Стратегический брендинг для&nbsp;лидерства на&nbsp;рынке</h1>
        <div class="hero__video" style="background-image: url('/img/hero/video.jpg')">
          <div class="hero__video-play">
            <svg width="27" height="30" viewBox="0 0 27 30" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path opacity="0.9" d="M24.5297 11.6664C26.8665 13.0156 26.8665 16.3886 24.5297 17.7377L5.4455 28.756C3.10865 30.1052 0.187597 28.4187 0.187597 25.7204L0.187597 3.68381C0.187597 0.985457 3.10865 -0.701015 5.44549 0.648162L24.5297 11.6664Z" fill="white"/>
            </svg>
          </div>
          <button class="hero__video-button fz-link">Смотреть шоурил</button>
        </div>
      </div>
      <div class="hero__slider" ref="slider">
        <div class="hero__slider-item">
          <img src="/img/hero/logos/logo-1.svg" alt="">
        </div>
        <div class="hero__slider-item">
          <img src="/img/hero/logos/logo-2.svg" alt="">
        </div>
        <div class="hero__slider-item">
          <img src="/img/hero/logos/logo-3.svg" alt="">
        </div>
        <div class="hero__slider-item">
          <img src="/img/hero/logos/logo-4.svg" alt="">
        </div>
      </div>
      <div class="hero__logo" ref="logo">
        <NuxtLink to="/">
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
        </NuxtLink>
      </div>
    </div>
  </section>

</template>

<script setup lang="ts">
import { gsap } from "gsap";
import { ScrollTrigger } from "gsap/ScrollTrigger";

const logo: any = ref( null );
const slider: any = ref( null );

gsap.registerPlugin(ScrollTrigger);
ScrollTrigger.defaults({
  markers: false
});

onMounted( () => {
  let tl = gsap.timeline({
    scrollTrigger: {
      trigger: '.home__cases',
      start: "top bottom",
      end: "top center",
      scrub: true,
    }
  });

  tl.from(logo.value, {
    y: "96vh",
    scale: 1,
    yPercent: -100,
    width: "100%",
    duration: 1,
  });

  setPosition();
  window.addEventListener("resize", setPosition);
} );

computed( () => {
  setPosition();
} )

const setPosition = () => {
  slider.value.style.bottom = (logo.value.getBoundingClientRect().height + 40) + 'px';
};
</script>

<style scoped lang="scss">
.hero {
  min-height: calc(100vh - 5rem);
  padding-top: 3.6rem;
  position: relative;

  &__header {
    display: flex;
    align-items: center;
    justify-content: space-between;

    @media (max-width: $tablet) {
      flex-wrap: wrap;
      margin-bottom: 4.4rem;
    }

    @media (max-width: $mobile) {
      margin-bottom: 12.2rem;
    }
  }

  &__title {
    max-width: 110rem;
    font-size: 7.2rem;
    line-height: 100%;
    letter-spacing: -.04rem;
    font-weight: 600;
    font-family: var(--ff-extended);
    margin: -1.2rem 0 0;

    @media (max-width: $tablet) {
      width: 100%;
      font-size: 5rem;
      line-height: 110%;
      margin-bottom: 6rem;
      margin-top: 0;
    }

    @media (max-width: $mobile) {
      font-size: 3.8rem;
      line-height: 100%;
      margin-bottom: 4rem;
      letter-spacing: -.08rem;
    }
  }
}

.hero__video {
  min-width: 13.4rem;
  height: 13.2rem;
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
  border-radius: 3.1rem;
  overflow: hidden;
  transition: var(--tr-regular);
  position: relative;

  & > * {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    transition: var(--tr-regular);
  }

  &:hover {
    min-width: 26.6rem;

    & .hero__video-button {
      opacity: 1;
      z-index: 5;
    }

    & .hero__video-play {
      opacity: 0;
    }
  }

  @media (max-width: $tablet) {
    width: 100%;
    height: 39.6rem;
  }

  @media (max-width: $mobile) {
    margin-left: 0;
    width: 100%;
    height: 25.7rem;
    border-radius: 2.4rem;
  }

  &-button {
    display: inline-block;
    cursor: pointer;
    padding: 1rem;
    border-radius: 1rem;
    border: 1px solid var(--fg-white);
    z-index: -1;
    opacity: 0;
    backdrop-filter: blur(1.5rem);
    background: rgba(255, 255, 255, 0.2);
    color: var(--fg-white);
    white-space: nowrap;
  }
}

.hero__slider {
  display: flex;
  align-items: center;
  position: absolute;
  bottom: 24.2rem;

  @media (max-width: $tablet) {
    overflow-y: auto;
    flex-wrap: nowrap;
    margin-left: var(--m-m-container);
    margin-right: var(--m-m-container);

    -ms-overflow-style: none;
    scrollbar-width: none;

    &::-webkit-scrollbar {
      width: 0;
      background: transparent;
    }
  }

  &-item {
    width: 26rem;
    max-width: 100%;
    margin-right: 10rem;

    & img {
      width: 100%;
      height: auto;
    }

    &:last-child {
      margin-right: 0;
    }

    @media (max-width: $tablet) {
      margin-right: 6rem;
    }
  }
}

.menu--open {
  & .hero__logo {
    opacity: 0;
    display: none;
  }
}

.hero__logo {
  position: fixed;
  top: 0;
  width: 17.7rem;
  left: 50%;
  transform: translateX(-50%);
  margin-top: 1rem;
  z-index: 1001;

  & a {
    display: block;
  }

  & svg {
    width: 100%;
    height: auto;
  }
}
</style>