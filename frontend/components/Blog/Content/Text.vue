<template>
  <div class="article__block article__content" v-if="data.title || data.text || data.blockquote">
    <div class="article__content-contaienr container">
      <div class="article__content-block">
        <h2 class="article__content-title fz-h2" v-if="data.title">{{ data.title }}</h2>
        <div class="article__content-blockquote" v-if="data.blockqoute">{{ data.blockqoute }}</div>
        <div class="article__content-text text__content" v-if="data.text" v-html="data.text"></div>
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
defineProps<{
  data?: {
    title?: string,
    text?: string,
    blockqoute?: string
  }
}>();
</script>

<style scoped lang="scss">
.article__content-block {
  max-width: 112rem;
  margin-left: auto;
}

.article__content-title {
  margin: 0 0 6rem;
}

.article__content-blockquote {
  font-size: 3.2rem;
  line-height: 125%;
  letter-spacing: -.1rem;
  margin-bottom: 5rem;
}

.article__content-text {
  max-width: 70rem;
  margin-left: auto;
}

</style>