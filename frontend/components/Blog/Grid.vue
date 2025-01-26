<template>
  <div class="blog__grid" v-if="columns.value && columns.value.colLeft.length">
    <div class="blog__col" v-for="(blog, colIndex) in columns.value" :key="colIndex">
      <BlogCard
          v-for="item in blog"
          :key="item.post_id"
          :title="item.post_title"
          :slug="item.post_slug"
          :image="item.image"
          :time-read="item.time_read"
          :categories="item.categories"
          :col-index="colIndex"
      />
    </div>
  </div>
</template>

<script setup lang="ts">
const props = defineProps<{
  data: object
}>();

const windowWidth = ref( 0 );
const setWindowWidth = () => {
  windowWidth.value = window.innerWidth;
}

onMounted( () => {
  setWindowWidth();
  window.addEventListener('resize', setWindowWidth);
} )

const columns = computed(() => {
  const data: object = ref({
    colLeft: [],
    colRight: [],
  });

  if (windowWidth.value < 992) {
    data.value.colLeft = props.data;
    data.value.colRight = [];
  } else {
    props.data.forEach((element, index) => {
      index += 1;
      if (index % 2 === 0) {
        data.value.colRight.push(element);
      } else {
        data.value.colLeft.push(element);
      }
    });
  }

  return data;
});
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