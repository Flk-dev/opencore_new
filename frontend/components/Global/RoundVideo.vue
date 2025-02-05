<template>
  <div
      class="video-round" :class="isPlay ? 'video-round--played' : ''"
      v-if="preview && link"
      :dataLink="link"
  >
    <div class="video-round__preview" :class="{ '_hide': isHidePreview }" :style="{ backgroundImage: `url(${ preview })` }"></div>
    <button class="video-round__play" @click="play">
      <svg width="22" height="24" viewBox="0 0 22 24" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path opacity="0.9" d="M19.8079 9.31302C21.671 10.3887 21.6711 13.078 19.8079 14.1536L4.59211 22.9385C2.72895 24.0142 0.4 22.6696 0.4 20.5182V2.9485C0.4 0.797107 2.72895 -0.547514 4.5921 0.52818L19.8079 9.31302Z" fill="white"/>
      </svg>
    </button>
    <video :src="link" class="video-round__video" ref="video"></video>
  </div>
</template>

<script setup lang="ts">
defineProps<{
  preview: string,
  link: string,
  classes?: string
}>();

const video = ref( null );
const isHidePreview = ref( false );
const isPlay = ref( false );

const play = () => {
  isHidePreview.value = true;
  isPlay.value = ! isPlay.value;

  if ( isPlay.value ) {
    video.value.play();
  } else {
    video.value.pause();
  }
}

</script>

<style scoped lang="scss">
.video-round {
  --width: 11.3rem;

  position: relative;
  min-width: var(--width);
  width: var(--width);
  height: var(--width);
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  overflow: hidden;

  &._big {
    --width: 20.4rem;
  }

  &._middle {
    --width: 15rem;
  }

  $root: &;

  &--played {
    #{$root}__play {
      opacity: 0;
    }

    &:hover {
      #{$root}__play {
        opacity: 1;
      }
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
    transition: all 0.4s;

    &._hide {
      opacity: 0;
      visibility: hidden;
    }
  }

  &__play {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    z-index: 5;
    transition: all .3s;
  }
}
</style>