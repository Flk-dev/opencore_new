<template>
  <section class="supporting section">
    <div class="supporting__container container">
      <BlockHeader :title="data.title" classes="supporting" />
      <div class="supporting__grid" v-if="columns.value.col_1.length">
        <div class="supporting__col" v-for="( col, colKey ) in columns.value" :key="colKey">
          <AccordionItem
              v-for="( item ) in col"
              :title="item.post_title"
              :text="item.home_text"
              :is-more="true"
              :to="'/services/' + item.post_slug"
          />
        </div>
      </div>
      <NuxtLink to="service" class="supporting__btn btn btn--ripple">
        <span>Все услуги</span>
      </NuxtLink>
    </div>
  </section>
</template>

<script setup lang="ts">
const props = defineProps<{
  data: {
    title: string,
    select: object
  }
}>();

const cols = ref( {
  col_1: [],
  col_2: [],
} );

const columns = computed(() => {
  const list = props.data.select;
  if ( list.length ) {
    list.forEach( ( element, index ) => {
      index += 1;
      if ( index % 2 === 0 ) {
        cols.value.col_2.push( element );
      } else {
        cols.value.col_1.push( element );
      }
    } );
  }

  return cols;
});
</script>

<style scoped lang="scss">
.supporting__block-header .block-header__title {
  max-width: 65.2rem;
}

@media (max-width: $mobile) {
  .supporting__block-header {
    margin-bottom: 4rem;
  }
}

.supporting__grid {
  display: grid;
  grid-template-columns: repeat(2, 1fr);
  gap: 3rem;

  @media (max-width: $tablet) {
    grid-template-columns: 1fr;
    gap: 0;
  }
}

.supporting__btn {
  margin-top: 8rem;

  @media (max-width: $mobile) {
    margin-top: 1rem;
  }
}

</style>