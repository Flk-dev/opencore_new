<template>
  <div class="services-item">
    <h2 class="services-item__title" v-html="name"></h2>
    <div class="services-item__content">
      <div class="services-item__text" v-if="description" v-html="description"></div>
      <div class="services-item__posts" v-if="posts">
        <NuxtLink
            class="services-item__post"
            v-for="post in posts" :key="post.post_id"
            :to="{ name: 'services-slug', params: { slug: post.post_slug } }"
        >
          <div class="services-item__post-fire" v-if="post.is_fire">🔥</div>
          <div class="services-item__post-title fz-link" v-html="post.post_title"></div>
        </NuxtLink>
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
defineProps<{
  name: string,
  description: string,
  posts?: Array<string>,
}>();
</script>

<style scoped lang="scss">
.services-item {
  padding: 3rem 0;
  margin-bottom: 9rem;
  display: flex;
  align-items: flex-start;
  justify-content: space-between;
  border-top: .15rem solid var(--fg-black);

  &__title {
    color: var(--fg-blue);
    max-width: 56.5rem;
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
  }

  &__post {
    position: relative;
    padding-left: 2.9rem;

    &-fire {
      position: absolute;
      left: 0;
      top: 0;
    }

    &-title {
      text-decoration: underline;
      line-height: 90%;
    }
  }
}
</style>