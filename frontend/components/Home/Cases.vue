<template>
  <SectionCases class="home__cases" :title="data.title" :data="posts">
    <template v-slot:filters>
      <CasesFilter v-if="categories" :data="categories" @filter="filter" />
    </template>
    <UIButton title="Все проекты" class="home__cases-btn btn--ripple" to="cases" />
  </SectionCases>
</template>

<script setup lang="ts">
const props = defineProps<{
  data: {
    title: string,
    select: object
  }
}>();

const { result: categories } = await useApi( '/cases/categories', {}, '/cases/categories' );

const posts: any = ref( props.data.select );
const termId: any = ref( 0 );
const filter = async (id: number | string) => {
  termId.value = id;

  await useAsyncData(
      'cases',
      () : any => $fetch(getApiUrl( '/cases/' ), {
        params: {
          category: termId.value,
        }
      }), {
        transform: ( resData : any ) => {
          posts.value = resData.data.posts;
        },
      },
  );
};

</script>

<style scoped lang="scss">
.home__cases {
  :deep(.cases__block-header) {
    max-width: 90.9rem;

    @media (max-width: $mobile) {
      margin-bottom: 6rem;
    }
  }
}

.home__cases-btn {
  @media (max-width: $tablet) {
    margin-top: 8rem;
  }
}
</style>