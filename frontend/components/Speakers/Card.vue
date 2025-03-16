<template>
  <div class="speakers-item">
    <div class="speakers-item__media item--cover">
      <img :src="image" alt="">
    </div>
    <div class="speakers-item__content">
      <div class="speakers-item__main">
        <div class="speakers-item__name fz-h4 fz-h2--mobile">{{ title }}</div>
        <div class="speakers-item__post fz-body fz-caption--mobile" v-if="post" v-html="post"></div>
      </div>
      <div class="speakers-item__experience" v-if="experience">
        <div class="speakers-item__experience-title fz-body">Опыт:</div>
        <div class="speakers-item__experience-text content__text" v-html="fixText(experience)"></div>
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
defineProps<{
  title: string,
  post?: string,
  experience?: string,
  image?: string
}>();
</script>

<style scoped lang="scss">

.speakers-item {
  display: flex;
  padding: 3rem;
  background: var(--fg-gray);
  border-radius: var(--br-regular);

  @media (max-width: $tablet) {
    flex-direction: column;
    padding: 2rem;
  }
}

.speakers-item__media {
  min-width: 47rem;
  height: 45rem;
  border-radius: var(--br-regular);
  overflow: hidden;

  @media (max-width: $tablet) {
    min-width: auto;
    width: 100%;
    margin-bottom: 3rem;
  }

  @media (max-width: $mobile) {
    height: 35.7rem;
    margin-bottom: 2rem;
  }
}

.speakers-item__content {
  width: calc(100% - 47rem);
  padding-left: 3rem;
  display: flex;
  flex-direction: column;
  justify-content: space-between;

  @media (max-width: $tablet) {
    width: 100%;
    padding-left: 0;
  }
}

.speakers-item__post {
  color: var(--fg-black-75);
  margin-top: .8rem;

  @media (max-width: $tablet) {
    margin-top: 1rem;
  }
}

.speakers-item__experience {
  margin-top: 2.5rem;
}

.speakers-item__experience-title {
  color: var(--fg-blue);
  margin-bottom: 1.5rem;

  @media (max-width: $mobile) {
    margin-bottom: 1rem;
  }
}

.speakers-item__experience-text {
  --fz: var(--fz-caption);
  --lh: var(--lh-caption);
  --m-bottom: 1.5rem;

  @media (max-width: $mobile) {
    --m-bottom: 1rem;
    --lh: 115%;
  }
}

</style>