<template>
  <template>
    <Header />
    <div class="content__page page-paddings">
      <div class="content__page-container container">
        <PageTitle title="Политика использования файлов Cookie" />
      </div>
    </div>
    <Footer />
  </template>
</template>

<script setup>

// definePageMeta( {
//   validate: async ( route ) => {
//     console.log( route );
//     // Check if the id is made up of digits
//     return typeof route.params.id === 'string' && /^\d+$/.test( route.params.slug )
//   }
// } );

const route = useRoute()
const config = useRuntimeConfig();
const error = useError();

const pageData = await useAsyncData(
    `${route.params.slug}`,
    () =>
        $fetch(`${config.public.WP_DEV}/pages`, {}).catch((error) => error.data),
    {
      transform: (resData) => {
        if ( resData.data.status === 404 ) {
          console.log( resData.data.status );
          //error({ statusCode: 404, message: err.message })
        }
      },
    },
)

console.log( pageData );

</script>

<style scoped>

</style>