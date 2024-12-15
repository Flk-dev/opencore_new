<template>
  <div class="article__head">
    <div class="article__head-container container">
      <div class="article__head-content">
        <div>
          <h1 class="article__head-title fz-h2">{{ title }}</h1>
          <div class="article__head-time" v-if="readTime">
            Время прочения {{ readTime }}
          </div>
        </div>
        <UIButton title="Подписаться на рассылку" classes="article__head-btn _border _small" />
      </div>
      <UIImage :image="image" :title="title" class="article__head-image">
        <div class="article__cats" v-if="categories">
          <template v-for="category in categories">
            <div class="article__cats-item">{{ category.name }}</div>
          </template>
        </div>
      </UIImage>
    </div>
  </div>
</template>

<script setup lang="ts">
const props = defineProps<{
  title: string
  image?: string,
  readTime?: string,
  categories?: object
}>();
</script>

<style scoped lang="scss">
.article__head {
  margin-bottom: 10rem;
}

.article__head-container {
  display: flex;
  justify-content: space-between;
}

.article__head-content {
  max-width: 50.6rem;
  display: flex;
  flex-direction: column;
  justify-content: space-between;
}

.article__head-title {
  margin: 0;
}

.article__head-time {
  color: var(--fg-black-50);
  margin-top: 2rem;
}

.article__head-btn {
  margin-top: 3rem;
}

.article__head-image {
  position: relative;
  max-width: 80rem;
}

.article__cats {
  display: flex;
  align-items: center;
  position: absolute;
  top: 1rem;
  left: 1rem;
}

.article__cats-item {
  margin-right: 1rem;
  height: 4.1rem;
  border-radius: var(--br-regular);
  display: flex;
  align-items: center;
  justify-content: center;
  padding: 0 2rem;
  background: var(--fg-white);
}

</style>