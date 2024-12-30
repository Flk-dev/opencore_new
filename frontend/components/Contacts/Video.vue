<template>
  <div class="contacts__video" v-if="video.link" :data-video="video.link">
    <button class="contacts__video-play">
      <svg width="25" height="27" viewBox="0 0 25 27" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path opacity="0.9" d="M22.6465 10.6816C24.7559 11.8995 24.7559 14.9441 22.6465 16.1619L5.42005 26.1076C3.31069 27.3254 0.673992 25.8031 0.673992 23.3675V3.47606C0.673992 1.04038 3.31069 -0.481916 5.42006 0.735924L22.6465 10.6816Z" fill="white"/>
      </svg>
    </button>
    <div class="contacts__video-bg" v-if="video.preview" :style="{backgroundImage: 'url('+video.preview+')'}"></div>
  </div>
</template>

<script setup lang="ts">
defineProps<{
  video: {
    link: string,
    preview: string
  }
}>();
</script>

<style scoped lang="scss">
.contacts__video {
  position: relative;
  min-width: 20.4rem;
  height: 20.4rem;
  border-radius: 50%;
  overflow: hidden;
  display: flex;
  align-items: center;
  justify-content: center;
}

.contacts__video-bg {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
}

.contacts__video-play {
  position: relative;
  z-index: 5;
}

</style>