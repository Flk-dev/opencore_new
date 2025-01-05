<template>
  <div class="footer__button">
    <div class="footer__button-container container">
      <div class="footer__button-title fz-h1" v-if="title" v-html="title"></div>
      <button class="footer__button-btn btn--ripple _white" :class="btnClass" :data-modal="action">
        <span>{{ btnTitle }}</span>
      </button>
    </div>
  </div>
</template>

<script setup lang="ts">
withDefaults(defineProps<{
  title?: string,
  btnTitle?: string,
  btnClass?: string
  action?: string,
}>(), {
  btnTitle: 'Получить КП',
  action: 'socialize'
});

</script>

<style scoped lang="scss">
.footer__button {
  padding: 2rem 0 7.5rem;
  background-color: var(--fg-blue);
}

.footer__button-btn {
  display: block;
  width: 100%;
  border: .15rem solid var(--fg-white);
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