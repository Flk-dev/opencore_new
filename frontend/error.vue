<template>
  <NuxtLayout>
    <div class="error__page">
      <GlobalHeader :is-white="true" class="error__page-header" />
      <div class="error__page-media">
        <img src="/img/404/glitch.gif" alt="">
      </div>
      <UIButton title="На главную" class="error__page-btn btn&#45;&#45;white" @click="handleError"/>
    </div>
  </NuxtLayout>
</template>

<script setup lang="ts">
const error = useError();

const handleError = () => {
  clearError({
    redirect: '/',
  });
};
</script>

<style scoped lang="scss">
.error__page {
  background-color: #3B3B3B;
  color: var(--fg-white);
  position: relative;
  overflow: hidden;
  height: 100vh;

  &-content {
    padding: 29.7rem 0 2rem;
  }

  &-media {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;

    & img {
      width: 140%;
      height: 140%;
      margin-top: -10rem;
      object-position: center center;
      object-fit: cover;
    }
  }

  &-btn {
    display: block;
    padding: 2.45rem 5.1rem;
    border-radius: var(--br-regular);
    border: .15rem solid var(--fg-white);
    color: var(--fg-white);
    font-size: var(--fz-button);
    line-height: var(--lh-button);
    width: 40.8rem;
    max-width: 100%;
    margin: 13.5rem auto 0;
    text-align: center;
    position: absolute;
    bottom: 2rem;
    left: 50%;
    transform: translateX(-50%);
    z-index: 5;

    @media (any-hover: hover) {
      &:hover {
        border-color: var(--fg-blue);

      }

      &:before {
        background: var(--fg-blue);
      }
    }

    :deep(span) {
      color: var(--fg-white);
    }

    @media (max-width: $mobile) {
      width: auto;
      padding: 2.5rem 3rem;
    }
  }
}

</style>