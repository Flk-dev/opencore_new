<template>
  <div class="cases__grid parallax" v-if="columns.value.colLeft.length" ref="grid">
    <div class="cases__col">
      <div ref="colLeft">
        <CasesCard
            v-for="item in columns.value.colLeft"
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
      <div ref="colRight" v-if="columns.value.colRight.length">
        <CasesCard
            v-for="item in columns.value.colRight"
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
    props.data.forEach((element: Array<string>, index: number) => {
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

const grid: any = ref( null );
const colLeft: any = ref( null );
const colRight: any = ref( null );

onMounted( () => {
  window.addEventListener( 'scroll', onScroll );
} );

const onScroll = () => {
  if ( ! colRight.value || ! colLeft.value ) {
    return;
  }

  const leftRect = colLeft.value.getBoundingClientRect();
  const rightRect = colRight.value.getBoundingClientRect();
  const gridRect = grid.value.getBoundingClientRect();

  const travel = leftRect.height - rightRect.height
  const offsetTop = gridRect.top + window.scrollY;
  const cols = grid.value.getBoundingClientRect().height - window.innerHeight;
  const interval = cols / travel;

  const scrolled: any = document.scrollingElement.scrollTop;

  const e = Math.round( ( scrolled ) - offsetTop ) / interval;
  const b = scrolled >= ( leftRect.top + window.scrollY ) + rightRect.height - window.innerHeight;

  if ( scrolled >= offsetTop && b == false ) {
    colRight.value.style.transform = "translate3d(0px, " + ( e ) + "px, 0px)";
  }
}
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
      --image-height: 31rem;
    }
  }

  &:last-child {
    :deep(.cases-item:nth-child(2n + 2)) {
      max-width: 52rem;
      --image-height: 31rem;
    }
  }
}

.cases__col {
  width: 50%;
  padding: 2rem 1.5rem 13.5rem var(--p-container);
  border-top: 1.5px solid var(--fg-blue);
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

  @media (max-width: $mobile) {

  }
}
</style>