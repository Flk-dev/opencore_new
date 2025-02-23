<template>
  <div class="services__head services-head">
    <div class="services-head__content">
      <h1 class="services-head__title fz-h2 fz-h1--tablet animate" v-if="title" v-animate>
        <span class="_up" v-html="title"></span>
      </h1>
      <h3 class="services-head__subtitle fz-h3 fz-h4--tablet fz-h2--mobile animate" v-if="subtitle" v-animate>
        <span class="_up" v-html="subtitle"></span>
      </h3>
    </div>
    <GlobalRoundVideo
        class="services-head__video _middle"
        v-if="video"
        :preview="video.preview"
        :link="video.link"
    />
  </div>
</template>

<script setup lang="ts">
const props = defineProps<{
  title?: string,
  subtitle?: string,
  video?: {
    preview: string,
    link: string
  },
}>();

const title = computed( () => {
  return props.title;
  //return props.title.replace(/<a/g, '<nuxt-link');
} );

</script>

<style scoped lang="scss">
.services-head {
  display: flex;
  align-items: flex-start;
  justify-content: space-between;
  margin-bottom: 13rem;

  @media (max-width: $tablet) {
    margin-bottom: 12rem;
  }

  @media (max-width: $mobile) {
    margin-bottom: 8rem;
  }

  &__content {
    max-width: 95.7rem;
  }

  &__title {
    margin: 0;
    padding-bottom: 1rem;

    :deep(a) {
      color: var(--fg-blue);
      border-bottom: 3px solid var(--fg-blue);

      @media (max-width: $mobile) {
        border-width: 2px;
      }
    }

    @media (max-width: $tablet) {
      max-width: 97%;
    }
  }

  &__subtitle {
    margin-top: 2.5rem;
    color: var(--fg-black-75);
    opacity: .75;
  }

  &__video {
    @media (max-width: $tablet) {
      display: none;
    }
  }
}
</style>