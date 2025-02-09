<template>
  <div class="cats__menu">
    <swiper
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
    </swiper>
  </div>
</template>

<script setup lang="ts">
import { Swiper, SwiperSlide } from 'swiper/vue';
import 'swiper/css';

withDefaults(defineProps<{
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
  margin: 0 var(--m-m-container) 2rem;

  &-list {
    padding: 0 var(--p-container);
  }

}

//swiper-container::part(.swiper) {
//  background-color: red;
//}

.cats__menu-list {
  //white-space: nowrap;
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