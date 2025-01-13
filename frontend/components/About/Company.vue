<template>
  <div class="about__company about-company">
    <div class="container">
      {{ data }}
      <GlobalBlockHeader :title="data.title" classes="about-company"/>
      <div class="about-company__content">
        <ContentText :text="data.text" class="about-company__text"/>
        <GlobalRoundVideo
            v-if="data.video_link"
            :link="data.video_link"
            :preview="data.video_preview"
            class="about-company__video _big"
        />
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
defineProps<{
  data: {
    title?: string,
    text?: string,
    video_preview?: string,
    video_link?: string,
  }
}>();
</script>

<style scoped lang="scss">
.about-company__block-header {
  max-width: 106rem;
  margin-bottom: 4rem;
}

.about-company__content {
  padding-left: 50rem;
  display: flex;
  align-items: flex-start;
  justify-content: space-between;
}

.about-company__text {
  max-width: 57.3rem;

  --fz: var(---fz-txt-case);
  --lh: var(--lh-txt-case);
}

.about-company__video {
  margin-top: -18rem;
}
</style>