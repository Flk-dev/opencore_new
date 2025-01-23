<template>
  <div class="blog-item">
    <NuxtLink :to="to">
      <UIImage :image="image" classes="blog-item__image">
        <div class="blog-item__cats" v-if="categories.length">
          <div class="blog-item__cats-item" v-for="category in categories">{{ category.name }}</div>
        </div>
      </UIImage>
    </NuxtLink>
    <div class="blog-item__time fz-caption" v-if="timeRead">{{ timeRead }}</div>
    <NuxtLink class="blog-item__title fz-headline fz-body--mobile" :to="to">{{ title }}</NuxtLink>
  </div>
</template>

<script setup lang="ts">
const props = defineProps<{
  image?: string,
  title: string,
  slug: string,
  timeRead?: string,
  categories?: object,
  colIndex?: string,
}>();

const to = ref( {
  name: 'blog-slug',
  params: {
    slug: props.slug,
  }
} )
</script>

<style scoped lang="scss">
.blog-item {
  margin-bottom: 25rem;

  &:last-child {
    margin-bottom: 0;
  }

  @media (max-width: $tablet) {
    margin-bottom: 8rem;
  }

  @media (max-width: $mobile) {
    margin-bottom: 6rem;
  }

  &__image {
    margin-bottom: 2rem;
    position: relative;
  }

  &__cats {
    position: absolute;
    top: 1rem;
    left: 1rem;
    display: flex;
    align-items: center;

    &-item {
      display: flex;
      align-items: center;
      justify-content: center;
      padding-left: 1.5rem;
      padding-right: 1.5rem;
      height: 3rem;
      background: var(--fg-white);
      font-size: 1.4rem;
      line-height: 110%;
      border-radius: 1rem;
      margin-right: 1rem;

      &:last-child {
        margin-right: 0;
      }
    }
  }

  &__time {
    color: var(--fg-black-50);
    margin-bottom: 1rem;
  }

  &__title {
    display: block;
    max-width: 80%;
  }
}
</style>