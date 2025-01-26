<template>
  {{ cols }}
</template>

<script setup lang="ts">
const props = defineProps<{
  data: object
}>();

// const cols = ref( {
//   colLeft: [],
//   colRight: []
// } );

const cols = computed( () => {
  // let data = {
  //   colLeft: [],
  //   colRight: [],
  // };

  //console.log( WindowInstanceMap.innerHeight );

  // props.data.forEach((item: any, key: number) => {
  //   if (key % 2 === 0) {
  //     data.colRight.push(item);
  //   } else {
  //     data.colLeft.push(item);
  //   }
  // })

  //return data;
} );

// const filter = () => {
//   if (props.data.length === 0) {
//     return;
//   }
//
//   if ( window.innerWidth < 992 ){
//     cols.value.colLeft = props.data;
//     cols.value.colRight = [];
//   } else {
//     cols.value.colLeft = [];
//     cols.value.colRight = [];
//     props.data.forEach((item: any, key: number) => {
//       if (key % 2 === 0) {
//         cols.value.colRight.push(item);
//       } else {
//         cols.value.colLeft.push(item);
//       }
//     })
//   }
// };
//
// onMounted( () => {
//   filter();
//   window.addEventListener( 'resize', filter )
// } )
</script>

<style scoped lang="scss">
.blog__grid {
  display: grid;
  grid-template-columns: repeat(2, 1fr);
  gap: 3rem;

  @media (max-width: $tablet) {
    grid-template-columns: 1fr;
    row-gap: 8rem;
  }
}

.blog__col {
  &:first-child {
    :deep(.blog-item:nth-child(2n + 1)) {
      max-width: 52rem;
      margin-left: auto;

      & .blog-item__title {
        max-width: 100%;
      }
    }
  }

  &:last-child {
    :deep(.blog-item:first-child) {
      margin-top: 17rem;

      @media (max-width: $mobile) {
        margin-top: 0;
      }
    }

    :deep(.blog-item:nth-child(2n + 2)) {
      max-width: 52rem;

      & .blog-item__title {
        max-width: 100%;
      }
    }
  }
}
</style>