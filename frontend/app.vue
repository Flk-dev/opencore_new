<template>
  <div>
    <Header />
      <NuxtLayout>
        <NuxtPage/>
      </NuxtLayout>
    <Footer />
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