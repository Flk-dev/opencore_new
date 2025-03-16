<template>
  <ContentText v-if="props.full" :text="fixText(props.full)" class="review-modal__text" />
  <div class="review-modal__footer">
    <div class="review-modal__logo" v-if="props.logo">
      <img :src="props.logo" alt="">
    </div>
    <div class="review-modal__main">
      <div class="review-modal__name fz-body" v-if="props.name">{{ props.name }}</div>
      <div class="review-modal__post fz-caption" v-if="props.post">{{ props.post }}</div>
    </div>
  </div>
</template>

<script setup lang="ts">
const { props } = useModal();
</script>

<style scoped lang="scss">
.review-modal__footer {
  margin-top: 6rem;
  display: flex;
  align-items: center;
}

.review-modal__logo {
  min-width: 8.8rem;
  margin-right: 1.5rem;
}

.review-modal__post {
  margin-top: 1rem;
  color: var(--fg-a1);
}

.review-modal__text {
  --fz: var(--fz-body-b);
  --lh: var(--lh-body-b);
}
</style>