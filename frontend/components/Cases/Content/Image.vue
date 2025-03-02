<template>
<div class="case-image" v-if="data.image">
  <UIImage :image="data.image" class="case-image__image" :class="[ data.is_border ? 'image--border' : '' ]" />
</div>
</template>

<script setup lang="ts">
defineProps<{
  data: {
    image: string,
    is_border?: boolean,
  }
}>();
</script>

<style scoped lang="scss">
.case-image {
  margin-top: 6rem;

  @media (max-width: $mobile) {
    margin-top: 3rem;
  }
}

.case-image__image {
  border-radius: 0;
}
.case-image__image {
  :deep( img ) {
    width: 100%;
    height: auto;
  }

  :deep(.image__picture) {
    border-radius: 0;
  }
}
</style>