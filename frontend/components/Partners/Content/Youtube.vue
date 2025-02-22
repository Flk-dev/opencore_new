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
    <GlobalYoutubeVideo class="partner-video__iframe" :preview="data.preview" :link="data.link" />
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
const props = defineProps<{
  data: {
    title: string,
    text?: string,
    logo?: string,
    logo_text?: string,
    preview?: string
  }
}>();

const output = ref( null );
const isHide = ref( false );

const play = () => {
  if (props.link) {
    isHide.value = true;
    output.value.innerHTML = '<iframe width="560" height="315" src="' + props.link + '&autoplay=true" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>';
  }
}

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
    border: 1px solid var(--fg-blue);
    min-width: 70rem;

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
        position: relative;

        &:after {
          content: '';
          position: absolute;
          left: 0;
          bottom: -.2rem;
          width: 0;
          height: .15rem;
          background: var(--fg-black-75);
          transition: width .5s;
        }

        &:hover:after {
          width: 100%;
        }
        //border-bottom: 1.5px solid var(--fg-black-75);
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