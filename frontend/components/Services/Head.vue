<template>
  <div class="services__head services-head">
    <div class="services-head__content">
      <h1 class="services-head__title fz-h2" v-if="title" v-html="title"></h1>
      <h3 class="services-head__subtitle fz-h3" v-if="subtitle" v-html="subtitle"></h3>
    </div>
    <GlobalRoundVideo
        class="services-head__video _middle"
        v-if="video.link.length"
        :preview="video.preview"
        :link="video.link"
    />
  </div>
</template>

<script setup lang="ts">
defineProps<{
  title?: string,
  subtitle?: string,
  video: object,
}>();
</script>

<style scoped lang="scss">
.services-head {
  display: flex;
  align-items: flex-start;
  justify-content: space-between;
  margin-bottom: 13rem;

  &__content {
    max-width: 95.7rem;
  }

  &__title {
    margin: 0;

    :deep(a) {
      color: var(--fg-blue);
      border-bottom: .3rem solid var(--fg-blue);
    }
  }

  &__subtitle {
    margin-top: 2.5rem;
    color: var(--fg-black-75);
  }
}
</style>