<template>
  <div class="cats__menu">
    <swiper
        class="cats__menu-list"
        v-if="data"
        :free-mode="true"
        slides-per-view="auto"
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
            :class="{ '_active': (activeIndex === key || category.term_id === activeIndex) }"
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

const props = withDefaults(defineProps<{
  hideAll?: boolean,
  data: Array<{
    term_id: number,
    name?: string
  }>,
  isActiveIndex?: number,
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

onMounted( () => {
  if ( props.isActiveIndex ) {
    activeIndex.value = parseInt( props.isActiveIndex );
    //activeIndex.value = isActiveIndex;
  }
} )

/*const cursor = ref<Ref|null>( null );

const changeCursor = ( event: any ) => {
  const x = event.clientX;
  const y = event.clientY;

  if( cursor.value ){
    cursor.value.$el.style.left = x + 'px';
    cursor.value.$el.style.top = y + 'px';
  }
}

const changeCursorSlider = ( event: any, pos: any ) => {
  const x = pos.clientX;
  const y = pos.clientY;

  if( cursor.value ){
    cursor.value.$el.style.left = x + 'px';
    cursor.value.$el.style.top = y + 'px';
  }
}*/

</script>

<style scoped lang="scss">
.cats__menu {
  margin: 0 var(--m-m-container) 2rem;

  &:hover {
    .cats__menu-cursor {
      opacity: 1;
    }
  }

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