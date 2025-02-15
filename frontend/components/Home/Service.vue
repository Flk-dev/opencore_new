<template>
  <section class="supporting section">
    <div class="supporting__container container">
      <GlobalBlockHeader :title="data.title" classes="supporting" class-title="fz-h1--tablet" />
      <div class="supporting__grid" v-if="columns.value.col_1.length">
        <div class="supporting__col" v-for="( col, colKey ) in columns.value" :key="colKey">
          <AccordionItem
              v-for="( item ) in col"
              :title="item.post_title"
              :text="item.home_text"
              :is-more="true"
              :to="'/services/' + item.post_slug"
              class="supporting__item"
          />
        </div>
      </div>
      <UIButton title="Все услуги" class="supporting__btn btn--ripple" to="services" />
    </div>
  </section>
</template>

<script setup lang="ts">
interface Select {
  post_title: string,
  text: string[],
  post_slug: string
}

const props = defineProps<{
  data: {
    title: string,
    select: string[]
  }
}>();

const columns = computed(() => {
  return getGridColumns( props.data.select )
});

// const cols = ref( {
//   col_1: [],
//   col_2: [],
// } );
//
// const columns = computed(() => {
//   const list = props.data.select;
//   if ( list.length ) {
//     list.forEach( ( element, index ) => {
//       index += 1;
//       if ( index % 2 === 0 ) {
//         cols.value.col_2.push( element );
//       } else {
//         cols.value.col_1.push( element );
//       }
//     } );
//   }
//
//   return cols;
// });
</script>

<style scoped lang="scss">
.supporting__block-header {

  & :deep(.block-header__title) {
    max-width: 65.2rem;

    @media (max-width: $tablet) {
      max-width: 50.7rem;
    }

    @media (max-width: $mobile) {
      max-width: 30.8rem;
    }
  }
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

.supporting__item {
  @media (max-width: $mobile) {
    :deep(.accordion-item__title) {
      font-size: 2rem;
      line-height: 100%;
      letter-spacing: -.05rem;
    }
  }
}

</style>