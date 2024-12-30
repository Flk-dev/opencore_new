<template>
  <div class="video-round" v-if="preview && link" :dataLink="link">
    <div class="video-round__preview" :style="{ backgroundImage: `url(${ preview })` }"></div>
    <button class="video-round__play">
      <svg width="22" height="24" viewBox="0 0 22 24" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path opacity="0.9" d="M19.8079 9.31302C21.671 10.3887 21.6711 13.078 19.8079 14.1536L4.59211 22.9385C2.72895 24.0142 0.4 22.6696 0.4 20.5182V2.9485C0.4 0.797107 2.72895 -0.547514 4.5921 0.52818L19.8079 9.31302Z" fill="white"/>
      </svg>
    </button>
  </div>
</template>

<script setup lang="ts">
defineProps<{
  preview: string,
  link: string,
  classes?: string
}>();
</script>

<style scoped lang="scss">
.video-round {
  position: relative;
  min-width: 11.3rem;
  height: 11.3rem;
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  max-width: 11.3rem;
  overflow: hidden;

  &._big {
    min-width: 20.4rem;
    height: 20.4rem;
  }

  &._middle {
    min-width: 15rem;
    height: 15rem;
  }
}

.video-round__preview {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
}

.video-round__play {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  z-index: 5;
}
</style>