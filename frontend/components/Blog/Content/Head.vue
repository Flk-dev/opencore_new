<template>
  <div class="article__head">
    <div class="article__head-container container">
      <div class="article__head-content">
        <div>
          <h1 class="article__head-title fz-h2 fz-h1--tablet fz-h1--mobile">{{ title }}</h1>
          <div class="article__head-time" v-if="readTime">
            Время прочения {{ readTime }}
          </div>
        </div>
        <UIButton title="Подписаться на рассылку" class="article__head-btn btn--border btn--small" />
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
defineProps<{
  title: string
  image?: string,
  readTime?: string,
  categories?: object
}>();
</script>

<style scoped lang="scss">
.article__head {
  margin-bottom: 15.6rem;

  @media (max-width: $tablet) {
    margin-bottom: 10rem;
  }

  @media (max-width: $mobile) {
    margin-bottom: 8rem;
  }
}

.article__head-container {
  display: flex;
  justify-content: space-between;

  @media (max-width: $tablet) {
    flex-direction: column;
  }
}

.article__head-content {
  max-width: 50.6rem;
  display: flex;
  flex-direction: column;
  justify-content: space-between;

  @media (max-width: $tablet) {
    order: 2;
    margin-top: 6rem;
    max-width: 100%;
  }

  @media (max-width: $mobile) {
    margin-top: 4rem;
  }
}

.article__head-title {
  margin: 0;
}

.article__head-time {
  color: var(--fg-black-50);
  margin-top: 1.5rem;
}

.article__head-btn {
  margin-top: 3rem;

  @media (max-width: $tablet) {
    margin-top: 6rem;
  }

  @media (max-width: $mobile) {
    margin-top: 8rem;
  }
}

.article__head-image {
  position: relative;
  max-width: 80rem;
  width: 100%;

  :deep( .image__picture ) {
    height: 51rem;
    position: relative;
  }

  :deep( .image__img ) {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    object-fit: cover;
    object-position: center;
  }

  @media (max-width: $tablet) {
   max-width: none;

    :deep( .image__picture ) {
      margin: 0 var(--m-m-container);
      position: relative;
      height: 38.8rem;
      max-width: none;
      border-radius: 0;

      @media (max-width: $mobile) {
        height: 24.2rem;
      }
    }
  }
}

.article__cats {
  display: flex;
  align-items: center;
  position: absolute;
  top: 1rem;
  left: 1rem;

  @media (max-width: $tablet) {
    top: auto;
    bottom: 2rem;
  }
}

.article__cats-item {
  margin-right: 1rem;
  height: 4.1rem;
  border-radius: var(--br-secondary);
  display: flex;
  align-items: center;
  justify-content: center;
  padding: 0 2rem;
  background: var(--fg-white);
}

</style>