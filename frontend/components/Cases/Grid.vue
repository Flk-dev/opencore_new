<template>
  <div class="cases__grid parallax" v-if="columns.value.col_1.length" ref="grid">
    <div class="cases__col">
      <div class="cases__left" ref="colLeft">
        <CasesCard
            v-for="item in columns.value.col_1"
            :key="item.post_id"
            :title="item.post_title"
            :image="item.image"
            :categories="item.categories"
            :subtitle="item.subtitle"
            :slug="item.post_slug"
        />
      </div>
    </div>
    <div class="cases__col">
      <div class="cases__right" v-if="columns.value.col_2.length" ref="colRight">
        <CasesCard
            v-for="item in columns.value.col_2"
            :key="item.post_id"
            :title="item.post_title"
            :image="item.image"
            :categories="item.categories"
            :subtitle="item.subtitle"
            :slug="item.post_slug"
        />
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
const props = defineProps<{
  data: object
}>();

const columns = computed(() => {
  return getGridColumns( props.data )
});

const grid = ref( '' );
const colLeft = ref( '' );
const colRight = ref( '' );

// const onScroll = ( event: any ) => {
//   const colLeftRect = colLeft.value.getBoundingClientRect();
//   const colRightRect = colRight.value.getBoundingClientRect();
//
//   const colLeftHeight = colLeft.value.clientHeight;
//   const colRightHeight = colRight.value.clientHeight;
//   const travel = colLeftHeight - colRightHeight;
//
//   const topOfColumns = ( grid.value.getBoundingClientRect().top + window.scrollY );
//   const columns = grid.value.getBoundingClientRect().height - window.innerHeight;
//   const scrollInterval = columns / travel;
//
//   const scrolled = document.scrollingElement.scrollTop;
//
//   const e = Math.round( ( scrolled ) - topOfColumns ) / scrollInterval;
//   const b = scrolled >= ( colLeftRect.top + window.scrollY ) + colRightRect.height - window.innerHeight;
//
//   if ( scrolled >= topOfColumns && b == false ) {
//     colRight.value.style.transform = "translate3d(0px, " + ( e ) + "px, 0px)";
//   }
// }
//
// onMounted( () => {
//   window.addEventListener( 'scroll', onScroll );
// } );
</script>

<style scoped lang="scss">
.cases__grid {
  display: flex;
  margin: 0 calc( -1 * var(--p-container) );

  @media (max-width: $tablet) {
    flex-direction: column;
    margin: 0;
  }
}

.cases__col {
  &:first-child {
    :deep(.cases-item:nth-child(2n + 1)) {
      max-width: 52rem;
      margin-left: auto;

      & .cases-item__media-pic {
        height: 39.7rem;
      }
    }
  }

  &:last-child {
    :deep(.cases-item:nth-child(2n + 2)) {
      max-width: 52rem;
    }
  }
}

.cases__col {
  width: 50%;
  padding: 2rem 1.5rem 13.5rem var(--p-container);
  border-top: .15rem solid var(--fg-blue);
  position: relative;

  &:after {
    content: '';
    position: absolute;
    top: 0;
    right: -.075rem;
    height: 100%;
    width: .15rem;
    background: var(--fg-blue);

    @media  (max-width: $tablet) {
      display: none;
    }
  }

  &:last-child {
    padding-left: 1.5rem;
    padding-right: var(--p-container);

    &:after {
      display: none;
    }

    & .cases-item._small {
      margin-left: 0;
    }

    @media (max-width: $tablet) {
      padding: 0;
    }
  }

  @media (max-width: $tablet) {
    width: 100%;
    padding: 0;
    border-top: none;
  }

  //@media (max-width: $tablet) {
  //  width: 100%;
  //  padding: 0;
  //  margin-bottom: 8rem;
  //  border-top: none;
  //
  //  &:after {
  //    display: none !important;
  //  }
  //
  //  &:first-child .cases-item:nth-child(3n + 3) {
  //    margin-left: inherit;
  //    margin-right: auto;
  //  }
  //
  //  &:last-child {
  //    margin-bottom: 0;
  //    padding: 0 !important;
  //
  //    & .cases-item._small {
  //      margin-left: auto;
  //    }
  //
  //    & .cases-item:nth-child(4n + 2) {
  //      margin-right: auto;
  //      margin-left: 0;
  //    }
  //  }
  //}

  @media (max-width: $mobile) {
    
  }
}
</style>