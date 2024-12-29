<template>
  <NuxtLayout>
    <div class="error__page">
      <div class="error__page-glitch">
        <img src="/img/404/404.png" alt="">
      </div>
      <div class="error__page-text fz-headline">Кажется вы попали не на ту страницу...</div>
      <NuxtLink to="/" class="error__page-btn">
        На главную
      </NuxtLink>
    </div>
  </NuxtLayout>
</template>

<script setup lang="ts">

</script>

<style scoped lang="scss">
.error__page {
  padding: 29.7rem 0 2rem;
  background-color: #3B3B3B;
  color: var(--fg-white);
}

.error__page-glitch {
  & img {
    margin: 0 auto;
  }
}

.error__page-text {
  text-align: center;
  margin-top: 6rem;
}

.error__page-btn {
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
}
</style>