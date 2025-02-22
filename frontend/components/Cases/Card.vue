<template>
  <NuxtLink 
    :to="{ name: 'cases-slug', params: { slug: slug } }" 
    class="cases-item"
    :class="[ add_border ? 'cases-item--border' : '' ]"
  >
    <div class="cases-item__media" v-if="image">
      <picture class="cases-item__media-pic">
        <img :src="image" class="cases-item__media-img" :alt="title">
      </picture>
      <div class="cases-item__categories" v-if="categories">
        <div class="cases-item__category" v-for="category in categories" :key="category.term_id">
          {{ category.name }}
        </div>
      </div>
    </div>
    <div class="cases-item__project fz-caption" v-if="subtitle" v-html="subtitle"></div>
    <h3 class="cases-item__title fz-headline fz-body--mobile" v-if="title" v-html="fixText(title)"></h3>
  </NuxtLink>
</template>

<script setup lang="ts">
/*defineProps<{
  image?: string,
  categories?: Array<{
    term_id: number,
    name: string
  }>,
  subtitle?: string,
  title?: string,
  slug?: string,
  addBorder?: boolean,
}>();*/

defineProps<{
  title?: string,
  slug?: string,
  image?: string,
  subtitle?: string,
  add_border?: string,
  categories?: Array<{
    term_id: number,
    name: string
  }>
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
      box-shadow: 0 5px 11px 0 rgba(112, 112, 112, 0.1), 0 19px 19px 0 rgba(112, 112, 112, 0.07), 0 43px 26px 0 rgba(112, 112, 112, 0.04), 0 77px 31px 0 rgba(112, 112, 112, 0.01), 0 121px 34px 0 rgba(112, 112, 112, 0);
    }
  }

  &:last-child {
    margin-bottom: 0;
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
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.04),
    0 15px 15px 0 rgba(0, 0, 0, 0.03),
    0 34px 20px 0 rgba(0, 0, 0, 0.02),
    0 60px 24px 0 rgba(0, 0, 0, 0.01),
    0 94px 26px 0 rgba(0, 0, 0, 0);

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