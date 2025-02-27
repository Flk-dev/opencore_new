<template>
  <div class="modal-hero__video">
    <video ref="video" controls>
      <source src="/img/hero/video.mp4" type="video/mp4" />
    </video>
  </div>
</template>

<script setup lang="ts">
const video: Ref = ref( null );

onMounted( () => {
  video.value.play();
} )
</script>

<style scoped lang="scss">
.modal-hero__video {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  border-radius: var(--br-regular);
  overflow: hidden;

  & video {
    width: 100%;
    height: 100%;
    object-fit: cover;
    object-position: center;
  }
}
</style>