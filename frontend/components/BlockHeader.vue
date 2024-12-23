<template>
<div class="block-header" :class="classes + '__block-header'">
  <h2 class="block-header__title" v-html="title"></h2>
  <div class="block-header__content" v-if="text">
    <div class="block-header__text fz-caption" v-html="text"></div>
  </div>
</div>
</template>

<script setup lang="ts">
defineProps<{
  title: string,
  classes?: string,
  text?: string
}>();
</script>

<style scoped lang="scss">
.block-header {
  display: flex;
  align-items: center;
  justify-content: space-between;
  margin-bottom: 8rem;

  //@media (max-width: $tablet) {
  //  flex-direction: column;
  //  align-items: flex-start;
  //}
  //
  //@media (max-width: $mobile) {
  //  margin-bottom: 6rem;
  //}
}

.block-header__title {
  font-size: var(--fz-h2);
  line-height: var(--lh-h2);
  letter-spacing: var(--lc-h2);
  font-family: var(--ff-extended);
}

</style>