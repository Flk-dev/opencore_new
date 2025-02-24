<template>
  <a :href="link" class="youtube-video" :class="{ 'youtube-video--played': isHide }" target="_blank">
    <div class="youtube-video__inner" ref="output"></div>
    <div
        class="youtube-video__preview"
        :style="{backgroundImage: 'url('+preview+')'}"
    ></div>
    <button class="youtube-video__play" @click="play">
      <svg width="37" height="41" viewBox="0 0 37 41" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path opacity="0.9" d="M33.78 15.9289C36.9889 17.7815 36.9889 22.4132 33.78 24.2658L7.574 39.3959C4.3651 41.2485 0.353981 38.9327 0.353981 35.2274V4.96731C0.353981 1.262 4.3651 -1.05382 7.57399 0.798833L33.78 15.9289Z" fill="white"/>
      </svg>
    </button>
  </a>
</template>

<script setup lang="ts">
const props = defineProps<{
  preview?: string,
  link?: string
}>();

const output = ref( null );
const isHide = ref( false );

const play = () => {
  // if (props.link) {
  //   isHide.value = true;
  //   output.value.innerHTML = '<iframe width="560" height="315" src="' + props.link + '&autoplay=true" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>';
  // }
}
</script>

<style scoped lang="scss">
.youtube-video {
  $root: &;
  position: relative;
  min-height: 39.3rem;
  border-radius: var(--br-regular);
  overflow: hidden;
  display: flex;
  align-items: center;
  justify-content: center;

  &--played {
    #{$root}__preview {
      opacity: 0;
      visibility: hidden;
    }

    #{$root}__play {
      opacity: 0;
      visibility: hidden;
    }
  }


  &__inner {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;

    :deep(iframe) {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      object-position: center;
      object-fit: cover;
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
    transition: all .3s;
  }

  &__play {
    position: absolute;
    z-index: 5;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    transition: all .3s;
  }
}
</style>