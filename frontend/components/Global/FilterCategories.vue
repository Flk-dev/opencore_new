<template>
  <div class="cats__menu">
    <swiper-container
        class="cats__menu-list"
        v-if="data.length"
        :free-mode="true"
        slides-per-view="auto"
        :mousewheel="true"
        :space-between="10"
    >
      <swiper-slide style="width: fit-content !important;">
        <button
            v-if="!hideAll"
            class="cats__menu-link"
            data-id="all"
            @click="filter( 'all', 'all')"
            :class="{ '_active': activeIndex === 'all' }"
        >
          Все
        </button>
      </swiper-slide>
      <swiper-slide
          v-for="(category, key) in data"
          :key="key"
          style="width: fit-content !important;"
      >
        <button
            class="cats__menu-link"
            :data-id="category.term_id"
            @click="filter( category.term_id, key)"
            :class="{ '_active': activeIndex === key }"
        >
          {{ category.name }}
        </button>
      </swiper-slide>
    </swiper-container>
  </div>
</template>

<script setup lang="ts">
const props = withDefaults(defineProps<{
  hideAll?: boolean,
  data: object,
}>(), {
  hideAll: false,
});

const list = ref( null );

const activeIndex = ref<string|number>( 'all' );
const emit = defineEmits( [ 'filter' ] );
const filter = ( id: any, index: number|string ) => {
  emit( 'filter', id );
  activeIndex.value = index;
}

const swipe = ( event ) => {
  list.value.scrollBy({
    left: event.deltaY < 0 ? -30 : 30,
  });

  event.preventDefault();
}
</script>

<style scoped lang="scss">
.cats__menu {
  margin-bottom: 2rem;
  overflow: hidden;
  margin-left: var(--m-m-container);
  margin-right: var(--m-m-container);
}

.cats__menu-list {
  display: flex;
  align-content: center;
  overflow-y: auto;
  padding-left: var(--p-container);
  padding-right: var(--p-container);
  white-space: nowrap;
  touch-action: pan-y;

  -ms-overflow-style: none;
  scrollbar-width: none;

  &::-webkit-scrollbar {
    width: 0;
    background: transparent;
  }

  //:deep(.swiper-slide) {
  //  width: fit-content;
  //}
}

.cats__menu-link {
  padding: 0 2rem;
  font-size: var(--fz-caption);
  border: 1.5px solid var(--fg-black);
  border-radius: 1.5rem;
  min-height: 4.1rem;
  display: flex;
  align-items: center;
  justify-content: center;
  transition: var(--tr-regular);

  &:last-child {
    margin-right: 0;
  }

  &._active {
    border-color: var(--fg-blue);
    color: var(--fg-white);
    background: var(--fg-blue);
  }

  &:hover:not(._active) {
    border-color: var(--fg-blue);
    color: var(--fg-blue);
  }

  @media (max-width: $mobile) {
    min-height: 3.8rem;
  }
}
</style>