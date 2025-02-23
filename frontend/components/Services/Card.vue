<template>
  <div class="services-item">
    <h2 class="services-item__title fz-h1--tablet animate" v-animate>
      <span class="_up" v-html="name"></span>
    </h2>
    <div class="services-item__content">
      <div class="services-item__text" v-if="description" v-html="description"></div>
      <div class="services-item__posts" v-if="posts">
        <NuxtLink
            class="services-item__post"
            v-for="post in posts" :key="post.post_id"
            :to="{ name: 'services-slug', params: { slug: post.post_slug } }"
        >
          <span class="services-item__post-fire" v-if="post.is_fire">🔥</span>
          <span class="services-item__post-title fz-link fz-body--mobile" v-html="post.post_title"></span>
        </NuxtLink>
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
defineProps<{
  name: string,
  description: string,
  posts?: Array<{
    post_id: number,
    post_slug: string,
    is_fire: boolean,
    post_title: string
  }>,
}>();
</script>

<style scoped lang="scss">
.services-item {
  padding: 3rem 0;
  margin-bottom: 9rem;
  display: flex;
  align-items: flex-start;
  justify-content: space-between;
  border-top: 1.5px solid var(--fg-black);

  @media (max-width: $tablet) {
    flex-direction: column;
    margin-bottom: 6rem;
  }

  @media (max-width: $mobile) {
    padding: 2rem 0;
    margin-bottom: 7rem;
  }

  &__title {
    color: var(--fg-blue);
    max-width: 56.5rem;

    @media (max-width: $tablet) {
      margin-bottom: 3rem;
    }

    @media (max-width: $mobile) {
      margin-bottom: 2rem;
    }
  }

  &__content {
    width: 79.8rem;
    max-width: 100%;
  }

  &__text {
    --fz: var(--fz-txt-case);
    --lh: var(--lh-txt-case);
  }

  &__posts {
    margin-top: 6rem;
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    row-gap: 3rem;
    column-gap: 1.5rem;

    @media (max-width: $mobile) {
      grid-template-columns: 1fr;
      row-gap: 1.5rem;
      margin-top: 4rem;
    }
  }

  &__post {
    position: relative;
    padding-left: 2.9rem;

    $root: &;

    &-fire {
      position: absolute;
      left: 0;
      top: 0;
    }

    &-title {
      border-bottom: 1.5px solid var(--fg-black);
      transition: var(--tr-regular);
    }

    @media(any-hover: hover) {
      &:hover {
        #{$root}-title {
          color: var(--fg-blue);
          border-color: var(--fg-blue);
        }
      }
    }
  }
}
</style>