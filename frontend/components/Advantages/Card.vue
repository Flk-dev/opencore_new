<template>
  <div class="advantages__item advantages-item animate" v-animate>
    <div class="advantages-item__icon" v-if="icon">
      <img :src="icon" class="advantages-item__icon-img" alt="">
    </div>
    <div class="advantages-item__title fz-h3 fz-h2--mobile animate animate__fadeIn" v-if="title" v-animate>
      <span class="_up" v-html="fixText(title)"></span>
    </div>
    <div class="advantages-item__text fz-caption fz-body--mobile" v-if="text" v-html="fixText(text)"></div>
  </div>
</template>

<script setup lang="ts">
defineProps<{
  title: string,
  icon?: string,
  text: string
}>();
</script>

<style scoped lang="scss">
.advantages-item {
  padding-top: 2rem;
  position: relative;

  &:before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 0;
    height: .15rem;
    background: var(--fg-white);
    transition: width .5s;
    transition-delay: .3s;
  }

  &._animated {
    &:before {
      width: 100%;
    }
  }

  &__icon {
    margin-bottom: 5.2rem;

    &-img {
     height: 4.7rem;
      width: auto;
    }

    @media (max-width: $tablet) {
      margin-bottom: 4rem;
    }

    @media (max-width: $mobile) {
      margin-bottom: 3rem;
    }
  }

  &__title {
    @media (max-width: $tablet) {
      :deep(br) {
        display: none;
      }
    }
  }

  &__text {
    margin-top: 3rem;
    max-width: 44rem;

    @media (max-width: $tablet) {
      max-width: 100%;

      & br {
        display: none;
      }
    }

    @media (max-width: $mobile) {
      margin-top: 2rem;
    }
  }
}
</style>