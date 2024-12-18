<template>
  <div class="speakers-item">
    <div class="speakers-item__media item--cover">
      <img :src="image" alt="">
    </div>
    <div class="speakers-item__content">
      <div class="speakers-item__main">
        <div class="speakers-item__name fz-h4">{{ title }}</div>
        <div class="speakers-item__post fz-body" v-if="post" v-html="post"></div>
      </div>
      <div class="speakers-item__experience" v-if="experience">
        <div class="speakers-item__experience-title fz-body">Опыт</div>
        <div class="speakers-item__experience-text text__content" v-html="experience"></div>
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
}

.speakers-item__media {
  min-width: 47rem;
  height: 45rem;
  border-radius: var(--br-regular);
  overflow: hidden;
}

.speakers-item__content {
  width: calc(100% - 47rem);
  padding-left: 3rem;
  display: flex;
  flex-direction: column;
  justify-content: space-between;
}

.speakers-item__post {
  color: var(--fg-black-75);
  margin-top: 1.3rem;
}

.speakers-item__experience {
  margin-top: 2rem;
}

.speakers-item__experience-title {
  color: var(--fg-blue);
  margin-bottom: 1.5rem;
}

.speakers-item__experience-text {
  --fz: var(--fz-caption);
  --lh: var(--lh-caption);
  --m-bottom: 1.5rem;
}

</style>