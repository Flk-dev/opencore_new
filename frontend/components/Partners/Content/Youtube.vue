<template>
<div class="partner__video partner-video">
  <div class="partner-video__container container">
    <div class="partner-video__content">
      <div>
        <h2 class="partner-video__title fz-h2 fz-h1--mobile">{{ data.title }}</h2>
        <div class="partner-video__text fz-h4 fz-h2--mobile" v-if="data.text" v-html="data.text"></div>
      </div>
      <div class="partner-video__logo">
        <div class="partner-video__logo-media">
          <img :src="data.logo" alt="">
        </div>
        <div class="partner-video__logo-text" v-if="data.logo_text" v-html="data.logo_text"></div>
      </div>
    </div>
    <div class="partner-video__iframe">
      <div class="partner-video__preview" :style="{backgroundImage: 'url('+data.preview+')'}"></div>
      <button class="partner-video__play">
        <svg width="37" height="41" viewBox="0 0 37 41" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path opacity="0.9" d="M33.78 15.9289C36.9889 17.7815 36.9889 22.4132 33.78 24.2658L7.574 39.3959C4.3651 41.2485 0.353981 38.9327 0.353981 35.2274V4.96731C0.353981 1.262 4.3651 -1.05382 7.57399 0.798833L33.78 15.9289Z" fill="white"/>
        </svg>
      </button>
    </div>
    <div class="partner-video__logo _tablet">
      <div class="partner-video__logo-media">
        <img :src="data.logo" alt="">
      </div>
      <div class="partner-video__logo-text" v-if="data.logo_text" v-html="data.logo_text"></div>
    </div>
  </div>
</div>
</template>

<script setup lang="ts">
defineProps<{
  data: {
    title: string,
    text?: string,
    logo?: string,
    logo_text?: string,
    preview?: string
  }
}>();
</script>

<style scoped lang="scss">
.partner-video {
  margin-top: var(--mt-content-block-secondary);

  &__container {
    display: flex;
    justify-content: space-between;

    @media (max-width: $tablet) {
      flex-direction: column;
    } 
  }

  &__content {
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    max-width: 66.4rem;
    margin-right: 3.6rem;

    @media (max-width: $tablet) {
      max-width: 100%;
      margin-right: 0;
    }    
  }

  &__iframe {
    min-height: 39.3rem;
    position: relative;
    border-radius: var(--br-regular);
    overflow: hidden;
    min-width: 70rem;
    display: flex;
    align-items: center;
    justify-content: center;
    border: 1px solid var(--fg-blue);

    @media (max-width: $tablet) {
      margin-top: 4rem;
      min-width: auto;
      width: 100%;
    }

    @media (max-width: $mobile) {
      margin-top: 3rem;
      min-height: auto;
      padding-bottom: 56.5%;
    }    
  }

  &__preview {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
  }

  &__play {
    position: absolute;
    z-index: 5;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
  }

  &__logo {
    display: flex;
    align-items: center;

    &._tablet {
      display: none;
    }

    & img {
      width: 8.5rem;
    }

    @media (max-width: $tablet) {
      & {
        display: none;
      }

      &._tablet {
        display: flex;
        margin-top: 4rem;
      }
    }

    @media (max-width: $mobile) {
      &._tablet {
        margin-top: 3rem;
      }
    }

    &-text {
      margin-left: 1.5rem;
      max-width: 29.8rem;
      font-size: var(--fz-body-b);
      line-height: var(--lh-body-b);
      color: var(--fg-black-75);

      & :deep(a) {
        border-bottom: 1.5px solid var(--fg-black-75);
      }      
    }
  }

  &__text {
    margin-top: 3rem;

    @media (max-width: $mobile) {
      --width: 34rem;
      max-width: var(--width);
      min-width: var(--width);
    }
  }
}

</style>