<template>

  <div class="cats__menu">
    <div class="cats__menu-container container">
      <div class="cats__menu-list">
        <button class="cats__menu-link" data-id="all">Все</button>
        <div v-for="category in pageData">
          {{ category.term_id }}
        </div>
      </div>
    </div>
  </div>

</template>

<script setup lang="ts">

// const categories = useApi( '/blog/categories' );
// console.log( categories );

// const myObject = reactive({
//   title: 'How to do lists in Vue',
//   author: 'Jane Doe',
//   publishedAt: '2016-04-10'
// })

// const route = useRoute();
// const config = useRuntimeConfig();
// const wp = config.public.WP_DEV
//
// const categories = await useAsyncData(
//     `${ route.params.slug }`,
//     () =>
//         $fetch( `${ wp }/blog/categories`, {  } ).catch( ( error ) => error.data ),
//     {
//       transform: ( result ) => {
//         return result;
//       },
//     },
// );
// console.log( categories );

// const route = useRoute();
// const config = useRuntimeConfig();
// const wp = config.public.WP_DEV
//
// const { data: categories, status } = await useAsyncData('blog', async () => {
//   const [categories] = await Promise.all([
//     $fetch(wp + '/blog/categories'),
//   ])
//
//   return { coupons, offers }
// })
//
// console.log( categories );
//
// const route = useRoute()
// const config = useRuntimeConfig()
//
// console.log( `${config.public.WP_DEV}blog/categories` );
//
// const { data: pageData, error } = await useAsyncData(
//     `${route.params.slug}`,
//     () =>
//         $fetch(`${config.public.WP_DEV}/blog/categorie`, {
//         }).catch((error) => error.data),
//     {
//       transform: (resData) => {
//         return resData.length ? resData : {}
//       },
//     },
// );
//
// console.log( resData );

</script>

<style scoped lang="scss">

</style>