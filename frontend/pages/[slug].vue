<template>
    <div class="content__page page-paddings">
      <div class="content__page-container container">
        <div class="content__page-left">
          <PageTitle classes="content__page-title" :title="post.data.title" />
          <div class="content__page-subtitle fz-h3" v-if="post.data.subtitle">{{ post.data.subtitle }}</div>
        </div>
        <div class="content__page-blocks">
          <div class="content__page-block content__text"
               v-if="post.data.page_content"
               v-for="content in post.data.page_content"
               v-html="content.text">
          </div>
        </div>
      </div>
    </div>
</template>

<script setup>

const route = useRoute();
const { result: post, error } = await useApi( '/pages/' + route.params.slug + '/', {}, '', true );

</script>

<style scoped lang="scss">
.content__page-container {
  display: grid;
  grid-template-columns: repeat(2, 1fr);
  gap: 3.5rem;
}

.content__page-title {
  margin: 0;
}

.content__page-block {
  margin-bottom: 8rem;

  --fz: var(--fz-body-b);
  --lh: var(--lh-body-b);
  --m-bottom: 2.2rem;
  --mt-ul: -1.5rem;

  &:last-child {
    margin-bottom: 0;
  }

  & ::v-deep a {
    text-decoration: underline;
  }
}

.content__page-subtitle {
  margin-top: 3rem;
  color: var(--fg-black-50);
  max-width: 44.8rem;
}

</style>