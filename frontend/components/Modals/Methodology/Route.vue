<template>
  <div class="route__video" :class="{ 'route__video--played': isPlayed }">
    <button class="route__video-btn" @click="play">
      <svg class="play" width="22" height="24" viewBox="0 0 22 24" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path opacity="0.9" d="M19.8079 9.31302C21.671 10.3887 21.6711 13.078 19.8079 14.1536L4.59211 22.9385C2.72895 24.0142 0.4 22.6696 0.4 20.5182V2.9485C0.4 0.797107 2.72895 -0.547514 4.5921 0.52818L19.8079 9.31302Z" fill="white"/>
      </svg>
      <svg class="pause" width="21" height="34" viewBox="0 0 21 34" fill="none" xmlns="http://www.w3.org/2000/svg">
        <foreignObject x="-19.5" y="-19.5" width="45" height="73"><div xmlns="http://www.w3.org/1999/xhtml"></div></foreignObject><path data-figma-bg-blur-radius="20" d="M3 3V31" stroke="white" stroke-opacity="0.7" stroke-width="5" stroke-linecap="round"/>
        <foreignObject x="-4.5" y="-19.5" width="45" height="73"><div xmlns="http://www.w3.org/1999/xhtml"></div></foreignObject><path data-figma-bg-blur-radius="20" d="M18 3V31" stroke="white" stroke-opacity="0.7" stroke-width="5" stroke-linecap="round"/>
      </svg>
    </button>
    <video ref="video">
      <source :src="props.link" type="video/mp4" />
    </video>
  </div>
</template>

<script setup lang="ts">

const { props } = useModal();
const video: Ref = ref( null );
const isPlayed = ref( false );

onMounted( () => {
  play();
} )

const play = () => {
  if ( ! isPlayed.value ) {
    video.value.play();
  } else {
    video.value.pause();
  }

  isPlayed.value = ! isPlayed.value;
}
</script>

<style scoped lang="scss">
:global(.modal--video-round .modal__close) {
  position: absolute;
  right: -3rem;
  top: 1rem;
  background: none;
}

:global(.modal--video-round .modal__close path) {
  stroke: var(--fg-white);
  fill: var(--fg-white);
}

:global(.modal--video-round .modal__content) {
  background: none;
  padding: 0;
  width: auto;
}

:global(.modal--video-round .modal__content video) {
  width: 100%;
  height: 100%;
  object-fit: cover;
  object-position: center;
}

.route__video {
  position: relative;
  width: 18rem;
  height: 18rem;
  border-radius: 50%;
  overflow: hidden;
  margin: 0 auto;

  &-btn {
    position: absolute;
    width: 100%;
    height: 100%;
    z-index: 5;

    & svg {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      transition: all .3s;
    }
  }

  & .pause {
    opacity: 0;
  }

  & .play {
    opacity: 1;
  }

  &--played {
    & .pause {
      opacity: 0;
    }

    & .play {
      opacity: 0;
    }


    &:hover {
      & .pause {
        opacity: 1;
      }
    }
  }
}
</style>