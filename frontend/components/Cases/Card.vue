<template>
  <NuxtLink :to="{ name: 'cases-slug', params: { slug: slug } }" class="cases-item" :class="[ addBorder ? 'cases-item--border' : '' ]">
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
  addBorder?: boolean,
}>();
</script>

<style scoped lang="scss">
.cases-item {
  --image-height: 57rem;
  --small-card: 52rem;

  display: block;
  margin-bottom: 8rem;

  $root: &;

  &--border {
    & .cases-item__media-pic {
      border: 1.5px solid var(--fg-blue);
    }
  }

  @media (max-width: $mobile) {
    margin-bottom: 6rem;
  }

  @media (any-hover: hover) {
    &:hover {
      #{$root}__media-img {
        transform: scale(1);
      }
    }
  }

  &__media {
    position: relative;
    margin-bottom: 2rem;

    &-pic {
      height: var(--image-height);
      position: relative;
      overflow: hidden;
      border-radius: var(--br-regular);

      @media (max-width: $mobile) {
        --image-height: 19.2rem !important;
      }
    }


    &-img {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      object-fit: cover;
      object-position: center;
      transform: scale(1.05);
      transform-origin: center center;
      transition: var(--tr-regular);

      @media (max-width: $tablet) {
        transform: scale(1);
      }
    }
  }

  &__categories {
    position: absolute;
    top: 1rem;
    left: 1rem;
    display: flex;
    align-items: center;
    flex-wrap: wrap;
  }

  &__category {
    background: var(--fg-white);
    padding: .75rem 1.5rem;
    font-size: 1.4rem;
    line-height: 110%;
    border-radius: 1rem;
    margin-right: .5rem;
    margin-bottom: .5rem;

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