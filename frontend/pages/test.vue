<template>
  <TransitionGroup name="list" tag="div">
    <div v-for="item in posts" :key="item.post_id">
      <NuxtLink :to="{ name: 'cases-slug', params: { slug: item.post_slug } }" class="cases-item">
        <div class="cases-item__media" v-if="item.image">
          <picture class="cases-item__media-pic">
            <img :src="item.image" class="cases-item__media-img" :alt="item.post_title">
          </picture>
        </div>
        <div class="cases-item__project fz-caption" v-if="item.subtitle">{{ item.subtitle }}</div>
        <h3 class="cases-item__title fz-headline fz-body--mobile" v-html="item.post_title"></h3>
      </NuxtLink>
    </div>
  </TransitionGroup>

  <button @click="cat">Сменить категории</button>
</template>

<script setup lang="ts">
const page = ref( 1 );
const termId = ref( 18 );

const { data: posts } = await useAsyncData(
    'cases',
    () : any => $fetch(getApiUrl( '/cases/' ), {
      params: {
        category: termId.value,
        page: 1
      }
    }), {
      watch: [termId, page],
      transform: ( resData : object ) => {
        return page.value === 1 ? resData.data : [ ...posts.value, ...resData.data ];
      },
    },
);

const cat = () => {
  termId.value = 11;
}
</script>

<style scoped lang="scss">
.list-enter-active,
.list-leave-active {
  transition: all 0.5s ease;
}
.list-enter-from,
.list-leave-to {
  opacity: 0;
  transform: translateX(30px);
}
</style>