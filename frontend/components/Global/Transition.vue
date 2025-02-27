<template>
  <div class="transition">
    <div class="transition__block transition__first">
      <div class="transition__first-inner">
        <div class="transition__bg"></div>
        <div class="transition__text">
          <div class="transition__text-logo">
            <svg width="595" height="163" viewBox="0 0 595 163" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M23.9233 139.363C7.97442 123.699 0 104.427 0 81.4531C0 58.5741 7.97442 39.3025 23.9233 23.5435C39.8721 7.8795 59.6183 0 83.1619 0C106.705 0 126.452 7.8795 142.4 23.5435C158.349 39.2076 166.324 58.4791 166.324 81.4531C166.324 104.332 158.349 123.604 142.4 139.363C126.452 155.027 106.705 162.906 83.1619 162.906C59.6183 162.811 39.8721 155.027 23.9233 139.363ZM47.7516 44.6188C38.1633 54.5868 33.4166 66.8333 33.4166 81.4531C33.4166 96.0729 38.1633 108.319 47.7516 118.287C57.3399 128.255 69.1117 133.192 83.1619 133.192C97.307 133.192 109.174 128.255 118.667 118.287C128.16 108.319 132.907 96.0729 132.907 81.4531C132.907 66.8333 128.16 54.5868 118.667 44.6188C109.174 34.6508 97.307 29.7142 83.1619 29.7142C69.1117 29.7142 57.3399 34.6508 47.7516 44.6188Z" fill="white"/>
              <path d="M218.551 160.535H186.273V2.375H253.202C270.48 2.375 284.53 7.31155 295.257 17.2796C305.985 27.2476 311.301 39.8738 311.301 55.2531C311.301 70.6323 305.985 83.1636 295.352 92.8468C284.72 102.53 270.669 107.467 253.202 107.467H218.646V160.535H218.551ZM218.551 31.045V78.7017H253.107C260.512 78.7017 266.397 76.5182 270.954 72.0563C275.511 67.5945 277.695 61.8984 277.695 54.9683C277.695 48.0381 275.416 42.3421 270.954 37.7853C266.397 33.2285 260.512 31.045 253.107 31.045H218.551Z" fill="white"/>
              <path d="M431.486 160.535H326.109V2.375H431.486V31.045H358.482V67.2147H429.207V95.6948H358.482V131.865H431.486V160.535Z" fill="white"/>
              <path d="M562.298 153.604V2.375H594.575V160.629H531.729L485.496 9.30516V160.535H453.219V2.375H515.875L562.298 153.604Z" fill="white"/>
            </svg>
          </div>
          <div class="transition__text-inner">
            <div class="transition__text-item transition__text--first" data-word-active="true">steady</div>
            <div class="transition__text-item transition__text--secondary" data-word-active="false">ready</div>
            <div class="transition__text-item transition__text--third" data-word-active="false">core</div>
            <div class="transition__text-item transition__text--first" data-word-active="false">steady</div>
            <div class="transition__text-item transition__text--secondary" data-word-active="false">ready</div>
            <div class="transition__text-item transition__text--third" data-word-active="false">core</div>
            <div class="transition__text-item transition__text--first" data-word-active="false">steady</div>
            <div class="transition__text-item transition__text--secondary" data-word-active="false">ready</div>
            <div class="transition__text-item transition__text--third" data-word-active="false">core</div>
          </div>
        </div>
      </div>
    </div>
    <div class="transition__block transition__last">
      <div class="transition__last-inner">
        <div class="transition__bg transition__bg--secondary"></div>
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
usePagePreloaderLogic();
</script>

<style scoped lang="scss">
.transition {
  position: fixed;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  overflow: hidden;
  z-index: 1001;
  pointer-events: none;
  transform: translateZ(0) rotate(0.001deg);
  isolation: isolate;

  &__first,
  &__last,
  &__last-inner,
  &__first-inner {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
    transform: translateZ(0) rotate(0.001deg);
    overflow: hidden;
    pointer-events: none;
    isolation: isolate;
  }

  &__first {
    z-index: 2;
  }

  &__last {
    z-index: 1;
  }

  &__bg {
    position: fixed;
    top: 0;
    left: 0;
    width: 100vw;
    height: 100vh;
    pointer-events: none;
    background: var(--fg-blue);


    &--secondary {
      background: var(--fg-blue);
    }
  }

  &__text {
    position: absolute;
    width: 100%;
    bottom: 4.2rem;
    padding: 0 0 0 2.9rem;
    overflow: hidden;

    display: flex;
    align-items: center;

    @media (max-width: $mobile) {
      padding-left: var(--p-container);
    }

    &-logo {
      & svg {
        width: 59.5rem;
        height: auto;

        @media (max-width: $tablet) {
          width: 32.5rem;
        }

        @media (max-width: $tablet) {
          width: 15rem;
        }
      }
    }

    &-item {
      font-family: var(--ff-atyp);
      font-style: italic;
      font-size: 23.3rem;
      letter-spacing: -2.2rem;
      text-transform: uppercase;
      color: var(--fg-white);
      line-height: 55%;
      height: 16.3rem;
      position: absolute;
      bottom: 0;
      //top: -100%;
      transition: all .3s;
      //transform: translateY(-150%);
      //transition: transform 0.32s ease-in;

      &[data-word-active="true"] {
        //top: 0;
        //transform: translateY(0);
        //transition: top 0.38s ease-out;
      }

      @media (max-width: $tablet) {
        font-size: 12.3rem;
        letter-spacing: -1.2rem;
        height: 8.5rem;
      }

      @media (max-width: $mobile) {
        font-size: 5.7rem;
        letter-spacing: -0.2rem;
        height: 4rem;
      }
    }
  }
}

@keyframes slideUp {
  0%,
  50% {
    transform: translateY(100%);
    opacity: 0;
  }

  60%,
  100% {
    transform: translateY(0);
    opacity: 1;

  }
}

</style>