<template>
  <div>
      <NuxtLayout>
        <GlobalHeader />
        <main class="main">
          <NuxtPage/>
        </main>
        <GlobalFooter />
        <GlobalCookie />
        <GlobalScrollIcon />
        <ModalsDefault />
      </NuxtLayout>
  </div>
</template>

<script setup lang="ts">
// Preload data
const contacts = useState('contacts');
const config = useRuntimeConfig();

await callOnce(async () => {
  contacts.value = await $fetch(`${ config.public.WP_DEV }/contacts`);
});
</script>

<style lang="scss">

</style>