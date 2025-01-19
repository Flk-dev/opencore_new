<template>
  <div class="history-card">
    <UIImage :image="image" classes_pic="history-card__image item--cover" />
    <h3 class="history-card__title fz-h3 fz-h2--mobile">{{ title }}</h3>
    <div class="history-card__subtitle fz-body" v-if="subtitle">{{ subtitle }}</div>
    <UIButton
      title="Подробнее"
      class="history-card__button btn--size-xs btn--border"
      @click="modal.open( ModalsCareerHistory, {
          title: title,
          text: subtitle,
          fullText: text,
          isWhite: true,
          width: '800'
      } )"
    />
  </div>
</template>

<script setup lang="ts">
import {ModalsCareerHistory} from "#components";

defineProps<{
  image?: string,
  title: string,
  subtitle?: string,
  text?: string
}>();

const modal = useModal();
</script>

<style scoped lang="scss">
:deep(.history-card__image) {
  height: 55rem;
  border-radius: 1.5rem;
  margin-bottom: 2.5rem;

  @media (max-width: $tablet) {
    margin-bottom: 1.5rem;
  }

  @media (max-width: $mobile) {
    height: 33rem;
  }
}

.history-card__subtitle {
  margin-top: 1.5rem;

  @media (max-width: $mobile) {
    margin-top: .5rem;
  }
}

.history-card__button {
  //height: 4.1rem;
  //display: flex;
  //align-items: center;
  //justify-content: center;
  //padding: 0 2rem;
  //font-size: var(--fz-caption);
  //line-height: var(--lh-caption);
  //letter-spacing: var(--lc-caption);
  //color: var(--fg-blue);
  //border: .15rem solid var(--fg-blue);
  //border-radius: var(--br-secondary);
  margin-top: 4rem;

  @media (max-width: $mobile) {
    margin-top: 2.6rem;
  }
}

</style>