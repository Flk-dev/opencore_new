<template>
  <div class="hero__video" :class="{ 'hero__video--played': isPlayed }">
    <video class="hero__video-video" muted loop ref="video">
      <source src="/img/hero/video.mp4" type="video/mp4" />
    </video>
    <div class="hero__video-play">
      <svg width="27" height="30" viewBox="0 0 27 30" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path opacity="0.9" d="M24.5297 11.6664C26.8665 13.0156 26.8665 16.3886 24.5297 17.7377L5.4455 28.756C3.10865 30.1052 0.187597 28.4187 0.187597 25.7204L0.187597 3.68381C0.187597 0.985457 3.10865 -0.701015 5.44549 0.648162L24.5297 11.6664Z" fill="white"/>
      </svg>
    </div>
    <button
        class="hero__video-button fz-link"
        @click="open"
    >
      Смотреть шоурил
    </button>
  </div>
</template>

<script setup lang="ts">
import {ModalsHeroVideo} from "#components";

const video: Ref = ref( null );
const isPlayed: Ref = ref( null );

const modal = useModal();

onMounted( () => {
  video.value.play();
  isPlayed.value = true;
} );

const open = () => {
  modal.open( ModalsHeroVideo, {
    customClass: "hero__video",
  } )
}
</script>

<style scoped lang="scss">
.hero__video {
  min-width: 13.4rem;
  height: 13.2rem;
  border-radius: 3.1rem;
  overflow: hidden;
  transition: var(--tr-regular);
  position: relative;

  $root: &;

  &-video {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    object-fit: cover;
    object-position: center;
  }

  &-play,
  &-button {
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


:global(.modal--hero__video .modal__close) {
  position: absolute;
  right: -5rem;
  top: -2rem;
  background: none;
}

:global(.modal--hero__video .modal__close path) {
  stroke: var(--fg-white);
  fill: var(--fg-white);
}

:global(.modal--hero__video .modal__content) {
  background: none;
  padding: 0;
  min-height: 49rem;
}
</style>