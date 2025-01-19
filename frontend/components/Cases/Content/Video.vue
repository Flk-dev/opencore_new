<template>
  <div class="case-video">
    <video class="case-video__video" autoplay="autoplay" loop="loop" muted="muted" mute="" playsinline="" data-wf-ignore="true" data-object-fit="cover">
      <source :src="data.link" data-wf-ignore="true">
    </video>
  </div>
</template>

<script setup lang="ts">
defineProps<{
  data: {
    link: string
  }
}>();
</script>

<style scoped lang="scss">
.case-video {
  height: 72rem;
  position: relative;

  &__video {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    object-fit: cover;
    object-position: center;
  }
}
</style>