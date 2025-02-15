<template>
  <div class="blog-item">
    <NuxtLink :to="to">
      <UIImage :image="image" classes="blog-item__image" classes-pic="item--cover">
        <div class="blog-item__cats" v-if="categories">
          <div class="blog-item__cats-item" v-for="category in categories">{{ category.name }}</div>
        </div>
      </UIImage>
    </NuxtLink>
    <div class="blog-item__time fz-caption" v-if="timeRead">{{ timeRead }}</div>
    <NuxtLink class="blog-item__title fz-headline fz-body--mobile" :to="to">{{ fixText(title) }}</NuxtLink>
  </div>
</template>

<script setup lang="ts">
interface Cats {
  name: string
}

const props = defineProps<{
  image?: string,
  title: string,
  slug: string,
  timeRead?: string,
  categories?: Array<Cats>,
}>();

const to = ref( {
  name: 'blog-slug',
  params: {
    slug: props.slug,
  }
} );
</script>

<style scoped lang="scss">
.blog-item {
  margin-bottom: 25rem;
  //opacity: 0;
  //transform: translateY(-50%);
  transition: opacity .2s, transform .8s;

  --image: 57rem;

  &--active {
    opacity: 1;
    transform: translateY(0);
  }

  &:last-child {
    margin-bottom: 0;
  }

  @media (max-width: $tablet) {
    margin-bottom: 8rem;
  }

  @media (max-width: $mobile) {
    margin-bottom: 6rem;
    --image: 19.2rem !important;
  }

  &__image {
    margin-bottom: 2rem;
    position: relative;

    :deep(.image__picture) {
      height: var(--image);
    }
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