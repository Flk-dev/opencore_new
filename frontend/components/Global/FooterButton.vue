<template>
  <div class="footer__button">
    <div class="footer__button-container container">
      <slot name="footer" v-if="$slots.footer" />
      <div v-else>
        <div class="footer__button-title fz-h1" v-if="title" v-html="title"></div>
        <UIButton
          :title="btnTitle"
          :class="[ 'footer__button-btn btn--white', btnClass ]"
          @click="action ? modal.open( ModalsMain, {
              title: 'Давайте общаться'
            } ) : null"
        />
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
import {ModalsMain} from "#components";

withDefaults(defineProps<{
  title?: string,
  btnTitle?: string,
  btnClass?: string
  action?: string,
}>(), {
  btnTitle: 'Получить КП',
  action: 'socialize'
});

const modal = useModal();

// const openModal = () => {
//   if ( props.action ) {
//     document.querySelector( `#${props.action}` ).classList.add( 'modal--open' );
//   }
// };
</script>

<style scoped lang="scss">
.footer__button {
  padding: 2rem 0 7.5rem;
  background-color: var(--fg-blue);
  
  @media (max-width: $tablet) {
    padding: 2rem 0;
  }
}

::v-global(.footer__button-grid) {
  display: grid;
  grid-template-columns: repeat(2, 1fr);
  gap: 1rem;
}

::v-global(.footer__button-btn) {
  display: block;
  width: 100%;
  border: 1.5px solid var(--fg-white);
  font-size: var(--fz-button);
  line-height: var(--lh-button);
  padding: 5.9rem 1rem;
  text-align: center;
  border-radius: var(--br-regular);
  color: var(--fg-white);

  @media (max-width: $tablet) {
    padding: 5rem 0;
  }

  @media (max-width: $mobile) {
    padding: 2.8rem 0;
  }
}

.footer__button-title {
  text-align: center;
  margin: 3rem 0 6rem;
  color: var(--fg-white);
}
</style>