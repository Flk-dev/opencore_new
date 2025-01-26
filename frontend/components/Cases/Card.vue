<template>
  <NuxtLink :to="{ name: 'cases-slug', params: { slug: slug } }" class="cases-item">
    <div class="cases-item__media" v-if="image">
      <picture class="cases-item__media-pic">
        <img :src="image" class="cases-item__media-img" :alt="title">
      </picture>
      <div class="cases-item__categories" v-if="categories.length">
        <div class="cases-item__category" v-for="category in categories" :key="category.term_id">
          {{ category.name }}
        </div>
      </div>
    </div>
    <div class="cases-item__project fz-caption" v-if="subtitle">{{ subtitle }}</div>
    <h3 class="cases-item__title fz-headline fz-body--mobile" v-html="title"></h3>
  </NuxtLink>
</template>

<script setup lang="ts">
defineProps<{
  image: string,
  categories?: object,
  subtitle?: string,
  title: string,
  slug: string,
}>();
</script>

<style scoped lang="scss">
.cases-item {
  --image-height: 57rem;
  --small-card: 52rem;

  display: block;
  margin-bottom: 8rem;

  @media (max-width: $mobile) {
    margin-bottom: 6rem;
  }

  &__media {
    position: relative;
    margin-bottom: 2rem;

    &-pic {
      height: var(--image-height);
      position: relative;

      @media (max-width: $mobile) {
        --image-height: 19.2rem !important;
      }
    }


    &-img {
      border-radius: var(--br-regular);
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      object-fit: cover;
      object-position: center;
    }
  }

  &__categories {
    position: absolute;
    top: 1rem;
    left: 1rem;
    display: flex;
    align-items: center;
  }

  &__category {
    background: var(--fg-white);
    padding: .75rem 1.5rem;
    font-size: 1.4rem;
    line-height: 110%;
    border-radius: 1rem;
    margin-right: .5rem;

    &:last-child {
      margin-right: 0;
    }

    @media (max-width: $mobile) {
      font-size: 1.2rem;
      margin-bottom: .5rem;
    }
  }

  &__project {
    margin-bottom: 1.2rem;
    line-height: 85%;
    color: var(--fg-black-75);
    opacity: .75;
  }

  &__title {
    letter-spacing: normal;
  }

  @media (max-width: $tablet) {
    &:nth-child(4n + 3) {
      margin-left: 0 !important;
    }
  }
}

</style>