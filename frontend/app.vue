<template>
  <div>
    <GlobalHeader />
      <NuxtLayout>
        <NuxtPage/>
      </NuxtLayout>
    <GlobalFooter />
    <GlobalCookie />
    <GlobalScrollIcon />
    <ModalsDefault />
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