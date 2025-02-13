<template>
  <div class="learning__video learning-video">
    <div class="learning__container container">
      <GlobalBlockHeader :title="data.title" classes="learning-video" class-title="fz-h1--tablet"/>
      <div class="learning-video__video" v-if="data.link">
        <div class="learning-video__bg" :style="{ backgroundImage: 'url('+ data.preview +')' }"></div>
        <button class="learning-video__play">
          <svg width="53" height="59" viewBox="0 0 53 59" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path opacity="0.9" d="M49.2186 23.661C53.8923 26.3593 53.8923 33.1052 49.2186 35.8036L11.0502 57.8401C6.37648 60.5385 0.534374 57.1656 0.534374 51.7688L0.534374 7.69575C0.534374 2.29904 6.37648 -1.0739 11.0502 1.62445L49.2186 23.661Z" fill="white"/>
          </svg>
        </button>
      </div>
      <div class="learning-video__info" v-if="data.text || data.logo">
        <div class="learning-video__text fz-h3 fz-h2--mobile" v-if="data.text" v-html="data.text"></div>
        <div class="learning-video__logo" v-if="data.logo">
          <img :src="data.logo" alt="">
        </div>
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
defineProps<{
  data: {
    title?: string,
    preview?: string,
    link?: string,
    text?: string,
    logo?: string,
  }
}>();
</script>

<style scoped lang="scss">
.learning-video__block-header {
  margin-bottom: 5rem;

  @media (max-width: $tablet) {
    margin-bottom: 3rem;
  }
}

.learning-video__video {
  display: flex;
  align-items: center;
  justify-content: center;
  height: 70rem;
  position: relative;

  @media (max-width: $tablet) {
    height: auto;
    padding-bottom: 42.5%;
  }

  @media (max-width: $mobile) {
    padding-bottom: 53%;
  }
}

.learning-video__bg {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  border-radius: var(--br-regular);
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
}

.learning-video__play {
  position: absolute;
  z-index: 5;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);

  @media (max-width: $mobile) {
    max-width: 2rem;
  }
}

.learning-video__info {
  margin-top: 4rem;
  display: flex;
  align-items: center;
  justify-content: space-between;

  @media (max-width: $mobile) {
    margin-top: 2rem;
    align-items: flex-start;
    flex-direction: column;
  }
}

.learning-video__text {
  max-width: 101.9rem;

  :deep(a) {
    color: var(--fg-blue);
    border-bottom: 1.8px solid var(--fg-blue);
  }

  @media (max-width: $tablet) {
    max-width: 56.7rem;
  }

  @media (max-width: $mobile) {
    max-width: 100%;
  }
}

.learning-video__logo {
  & img {
    width: 8.5rem;
  }

  @media (max-width: $mobile) {
    max-width: 4.2rem;
    margin-top: 2rem;
  }
}

</style>