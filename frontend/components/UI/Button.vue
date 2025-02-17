<template>
  <NuxtLink
      v-if="to"
      :to="to"
      ref="button"
      :class="classes"
      :style="{ '--width': width + 'px', '--height': width + 'px' }"
      @mouseover="animateButton( $event )">
    <span v-html="title"></span>
  </NuxtLink>
  <button
      v-else
      ref="button"
      :class="classes"
      :style="{ '--width': width + 'px', '--height': width + 'px' }"
      @mouseover="animateButton( $event )"
      title=""
  >
    <span v-html="windowWidth < 601 && titleMobile ? titleMobile : title"></span>
  </button>
</template>

<script setup lang="ts">
defineProps<{
  title: string,
  titleMobile?: string,
  to?: object | string
}>();

const button: any = ref( null );
const classes: object = ref( [ 'btn', 'btn--ripple' ] );
const width = ref( 0 );

const { width: windowWidth } = useWindowSize();

onMounted( () => {
  if ( button.value.$el ){
    width.value = button.value.$el.offsetWidth;
  } else {
    width.value = button.value.offsetWidth;
  }

  width.value *= 2;
} )
</script>

<style lang="scss">
.btn {
  $root: &;

  display: block;
  width: 100%;
  padding: 2.2rem 0 2.6rem;
  font-size: var(--fz-button);
  line-height: var(--lh-button);
  border: .15rem solid var(--fg-blue);
  border-radius: var(--br-regular);
  text-align: center;
  color: var(--fg-blue);
  overflow: hidden;
  position: relative;
  transition: var(--tr-regular);

  &--size-xs {
    max-width: fit-content;
    padding: 1.1rem 2rem 1.3rem;
    font-size: var(--fz-caption);
    color: var(--fg-white);
    border-radius: var(--br-secondary);

    &:before {
      transition: width 0.5s, height 0.5s !important;
    }

    @media (max-width: $tablet) {
      padding: 1.1rem 1.8rem 1.3rem !important;
    }
  }

  &--border {
    color: var(--fg-blue);
  }

  @media (any-hover: hover) {
    &:hover {
      color: var(--fg-white);
    }
  }

  &--small {
    font-size: 2rem;
    letter-spacing: -.02rem;
    line-height: 110%;
    border-radius: var(--br-secondary);
    padding: 2.5rem 0 2.5rem;
  }

  &--border {
    color: var(--fg-blue);
  }

  &--ripple {
    position: relative;
    overflow: hidden;
    z-index: 5;

    & > span {
      position: relative;
      pointer-events: none;
      transition: all .3s;
    }

    &::before {
      content: "";
      position: absolute;
      background-color: var(--fg-blue);
      width: 0;
      height: 0;
      left: var(--xPos);
      top: var(--yPos);
      transform: translate(-50%, -50%);
      border-radius: 50%;
      transition: width .6s, height .6s;
      z-index: -1;
    }

    @media (any-hover: hover) {
      &:hover::before {
        width: var(--width);
        height: var(--height);
        transition: width 1s, height 1s;
      }
    }
  }

  &--white-fill {
    border-color: var(--fg-white);
    background: var(--fg-white);
    color: var(--fg-blue);

    &:before {
      background-color: var(--fg-blue);
    }

    @media (any-hover: hover) {
      &:hover {
        border-color: var(--fg-blue);
        color: var(--fg-white) !important;
      }
    }
  }

  &--white {
    border-color: var(--fg-white);
    color: var(--fg-white);

    &:before {
      background-color: var(--fg-white);
    }

    @media (any-hover: hover) {
      &:hover span {
        color: var(--fg-blue);
      }
    }
  }

  @media (max-width: $tablet) {
    padding: 2.4rem 0;
  }
}
</style>