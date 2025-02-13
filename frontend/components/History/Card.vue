<template>
  <div class="history-card">
    <div class="history-card__main">
      <UIImage
        :image="image"
        class="history-card__image"
        classes-pic="item--cover"
        @click="openModal"
    />
    <h3 class="history-card__title fz-h3 fz-h2--mobile">{{ title }}</h3>
    <div class="history-card__subtitle fz-body" v-if="subtitle">{{ subtitle }}</div>
    </div>
    <UIButton
      title="Подробнее"
      class="history-card__button btn--size-xs btn--border"
      @click="openModal"
    />
  </div>
</template>

<script setup lang="ts">
import {ModalsCareerHistory} from "#components";

const props = defineProps<{
  image?: string,
  title: string,
  subtitle?: string,
  text?: string
}>();

const modal = useModal();
const openModal = () => {
  modal.open( ModalsCareerHistory, {
      title: props.title,
      text: props.subtitle,
      fullText: props.text,
      isWhite: true,
      width: '800',
      customClass: 'history'
  } )
}
</script>

<style scoped lang="scss">
.history-card {
  display: flex;
  flex-direction: column;
  justify-content: space-between;
  height: 100%;
  position: relative;

  &__image {
    :deep( .image__picture  ){
      height: 55rem;
      border-radius: 1.5rem;
      margin-bottom: 2.5rem;
      cursor: pointer;

      @media (max-width: $tablet) {
        margin-bottom: 1.5rem;
      }

      @media (max-width: $mobile) {
        height: 33rem;
      }
    }
  }

  &__subtitle {
    margin-top: 1.5rem;

    @media (max-width: $mobile) {
      margin-top: .5rem;
    }
  }

  &__button {
    margin-top: 4rem;

    @media (max-width: $mobile) {
      margin-top: 2.6rem;
    }
  }
}

@media (max-width: $tablet) {
  :global(.modal--history .modal__title) {
    font-size: var(--fz-h4);
    max-width: 47.5rem;
  }
}

@media (max-width: $mobile) {
  :global(.modal--history .modal__title) {
    font-size: var(--fz-h2);
    max-width: 47.5rem;
  }
}

</style>