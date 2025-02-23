<template>
  <div
      class="block-header"
      :class="classes + '__block-header'"
  >
    <div class="animate" v-animate>
      <h2
          class="block-header__title fz-h1--mobile animate _up"
          :class="[ ( classTitle === 'fz-h1' ? 'fz-h1' : 'fz-h2' ), classTitle ]"
          v-html="title"
      ></h2>
    </div>
    <div class="block-header__content">
      <div class="block-header__text fz-caption" v-if="text" v-html="text"></div>
      <slot />
    </div>
  </div>
</template>

<script setup lang="ts">
defineProps<{
  title?: string,
  classes?: string,
  text?: string,
  classTitle?: string,
}>();
</script>

<style scoped lang="scss">
.block-header {
  display: flex;
  align-items: center;
  justify-content: space-between;
  margin-bottom: 8rem;

  &.mb--40 {
    margin-bottom: 4rem;
  }

  @media (max-width: $tablet) {
    flex-direction: column;
    align-items: flex-start;
    margin-bottom: 6rem;
  }

  @media (max-width: $mobile) {
    margin-bottom: 4rem;
  }
}

.block-header__title {
  @media (max-width: $tablet) {
    :deep(br) {
      display: none;
    }
  }
}

.block-header__content {
  @media (max-width: $tablet) {
    display: flex;
    align-items: center;
  }
}
</style>