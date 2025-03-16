<template>
  <div class="cats__menu">
    <swiper
        class="cats__menu-list"
        v-if="data"
        :modules="[Navigation]"
        :free-mode="true"
        slides-per-view="auto"
        :space-between="10"
        :navigation="{enabled: true, prevEl: '.cats__menu-prev', nextEl: '.cats__menu-next'}"
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

    <button class="cats__menu-nav cats__menu-prev">
      <svg width="26" height="26" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
        <g clip-path="url(#clip0_6485_93248)">
          <path d="M9.69744 12.9844L19.3404 22.6596L19.7422 22.2578L12.2072 14.7227C11.2566 13.7722 11.2563 12.2312 12.2064 11.2802L19.7399 3.74L19.3401 3.34008L9.69744 12.9844Z" fill="black" stroke="black"/>
        </g>
        <defs>
          <clipPath id="clip0_6485_93248">
            <rect width="26" height="26" fill="white" transform="matrix(0 -1 1 0 0 26)"/>
          </clipPath>
        </defs>
      </svg>
    </button>
    <button class="cats__menu-nav cats__menu-next">
      <svg width="26" height="26" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
        <g clip-path="url(#clip0_6485_92995)">
          <path d="M16.3026 12.9844L6.65956 22.6596L6.25779 22.2578L13.7928 14.7227C14.7434 13.7722 14.7437 12.2312 13.7936 11.2802L6.26009 3.74L6.65992 3.34008L16.3026 12.9844Z" fill="black" stroke="black"/>
        </g>
        <defs>
          <clipPath id="clip0_6485_92995">
            <rect width="26" height="26" fill="white" transform="matrix(0 -1 -1 0 26 26)"/>
          </clipPath>
        </defs>
      </svg>

    </button>
  </div>
</template>

<script setup lang="ts">
import { Swiper, SwiperSlide } from 'swiper/vue';
import { Navigation } from 'swiper/modules';
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

.cats__menu-nav {
  position: absolute;
  top: 50%;
  left: 0;
  transform: translateY(-50%);
  background: linear-gradient(-90deg, rgba(255, 255, 255, 0) 0%, #fff 57%);
  width: 7rem;
  height: 8.9rem;
  padding-left: 1.5rem;
  z-index: 5;
  display: flex;
  align-items: center;
  justify-content: flex-start;
  transition: all .3s;

  &.swiper-button-disabled {
    opacity: 0;
  }
}

.cats__menu-next {
  left: auto;
  right: 0;
  background: linear-gradient(90deg, rgba(255, 255, 255, 0) 0%, #fff 57%);
  justify-content: flex-end;
  padding-right: 1.5rem;
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