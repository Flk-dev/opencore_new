<template>
  <button class="loadmore" ref="button"  @click="animateButton">
    <svg width="54" height="54" viewBox="0 0 54 54" fill="none" xmlns="http://www.w3.org/2000/svg">
      <path d="M25.6993 53.6654V32.2108C25.6993 30.0017 23.9085 28.2108 21.6993 28.2108H0.333496V25.7866H21.6993C23.9085 25.7866 25.6993 23.9957 25.6993 21.7866V0.332031H28.301V21.7866C28.301 23.9957 30.0918 25.7866 32.301 25.7866H53.6668V28.2108H32.301C30.0918 28.2108 28.301 30.0017 28.301 32.2108V53.6654H25.6993Z" fill="white"/>
    </svg>
  </button>
</template>



<script setup lang="ts">
const button = ref<Ref|null>(null);
const emit = defineEmits( ['loadMore'] );

const animateButton = ( event: any ) => {
  button.value.classList.add('animate');
  emit('loadMore', button.value);
}
</script>

<style scoped lang="scss">
.loadmore {
  display: flex;
  align-items: center;
  justify-content: center;
  width: 8rem;
  height: 8rem;
  border-radius: 50%;
  background: var(--fg-blue);
  margin: var(--mt-content-block-secondary) auto 0;

  @media (max-width: $mobile) {
    width: 6rem;
    height: 6rem;

    & svg {
      max-width: 4.3rem;
    }
  }
}
</style>