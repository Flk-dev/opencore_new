<template>
  <div class="page__header" ref="pageHeader" :class="{ 'page__header--sticky': isSticky }">
    <div class="page__header-container container">
      <slot />
    </div>
  </div>
</template>

<script setup lang="ts">
const props = withDefaults(defineProps<{
  isSticky?: boolean;
}>(), {
  isSticky: false,
});

const pageHeader = ref<Ref|null>( null );

onMounted( () => {
  window.addEventListener( 'scroll', () => {
    if ( props.isSticky && pageHeader.value ) {
      if (window.pageYOffset > 200) {
        pageHeader.value.classList.add('page__header--sticky-active');
      } else {
        pageHeader.value.classList.remove('page__header--sticky-active');
      }
    }
  })
} )
</script>

<style lang="scss">
.page__header {
  padding: 12rem 0;
  transition: filter .3s;

  @media (max-width: $tablet) {
    padding: 10rem 0;
  }

  @media (max-width: $mobile) {
    padding: 8rem 0;
  }

  &--sticky {
    position: sticky;
    top: 0;
    z-index: -1;
    background: var(--fg-white);
    transition: all .3s;

    &:after {
      content: '';
      position: absolute;
      left: 0;
      top: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(255, 255, 255, .55);
      opacity: 0;
      transition: opacity .2s;
    }

    &-active {
      filter: blur(8px);
      top: 50%;
      transform: translate(0, -50%);

      &:after {
        opacity: 1;
      }
    }
  }

  & svg {
    margin: 0 auto;
    width: 120.4rem;
    max-width: 100%;
    height: auto;

    @media (max-width: $tablet) {
      height: 6.3rem;
    }

    @media (max-width: $mobile) {
      height: 2.9rem;
    }
  }
}

</style>