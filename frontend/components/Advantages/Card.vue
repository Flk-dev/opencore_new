<template>
  <div class="advantages__item advantages-item">
    <div class="advantages-item__icon" v-if="icon">
      <img :src="icon" class="advantages-item__icon-img" :alt="title">
    </div>
    <div class="advantages-item__title fz-h3 fz-h2--mobile" v-if="title" v-html="title"></div>
    <div class="advantages-item__text fz-caption fz-body--mobile" v-if="text" v-html="text"></div>
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
  border-top: .15rem solid var(--fg-white);
}

.advantages-item__icon {
  margin-bottom: 5.2rem;

  @media (max-width: $mobile) {
    margin-bottom: 3rem;
  }
}

.advantages-item__title {
  @media (max-width: $tablet) {
    & br {
      display: none;
    }
  }
}

.advantages-item__text {
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

</style>