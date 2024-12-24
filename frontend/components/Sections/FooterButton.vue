<template>
  <div class="footer__button">
    <div class="footer__button-container container">
      <button class="footer__button-btn btn--ripple _white" :class="btn_class" :data-modal="action">
        <span>{{ btn }}</span>
      </button>
    </div>
  </div>
</template>

<script setup lang="ts">
const props = withDefaults(defineProps<{
  title?: string,
  btn: string,
  btn_class?: string
  action: string,
}>(), {
  btn: 'Получить КП',
  action: 'socialize'
})
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
</style>