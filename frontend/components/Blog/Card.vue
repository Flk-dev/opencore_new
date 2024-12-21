<template>
<div class="blog-item">
  <NuxtLink :to="{ name: 'blog-slug', params: { slug: slug } }">
   <UIImage :image="image" classes="blog-item__image">
       <div class="blog-item__cats" v-if="categories.length">
         <div class="blog-item__cats-item" v-for="category in categories">{{ category.name }}</div>
       </div>
   </UIImage>
  </NuxtLink>
  <div class="blog-item__time fz-caption" v-if="timeRead">
    {{ timeRead }}
  </div>
  <NuxtLink class="blog-item__title fz-headline" :to="{ name: 'blog-slug', params: { slug: slug } }">{{ title }}</NuxtLink>
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
</script>

<style scoped lang="scss">
.blog-item {
  margin-bottom: 8rem;

  &:last-child {
    margin-bottom: 0;
  }
}

::v-deep .blog-item__image {
  margin-bottom: 2rem;
}

.blog-item__cats {
  position: absolute;
  top: 1rem;
  left: 1rem;
  display: flex;
  align-items: center;
}

.blog-item__cats-item {
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

.blog-item__time {
  color: var(--fg-black-50);
  margin-bottom: 1.2rem;
}
</style>