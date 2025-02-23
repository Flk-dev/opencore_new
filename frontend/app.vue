<template>
  <div>

      <NuxtLayout>
        <GlobalHeader />
          <NuxtPage/>
        <GlobalFooter />
        <GlobalCookie />
        <GlobalScrollIcon />
        <ModalsDefault />
      </NuxtLayout>
  </div>
</template>

<script setup lang="ts">
// Preload data
import {useAnimateTitles} from "~/composables/useAnimateTitles";

const contacts = useState('contacts');
const config = useRuntimeConfig();

await callOnce(async () => {
  contacts.value = await $fetch(`${ config.public.WP_DEV }/contacts`);
});

// onMounted( () => {
//   useAnimateTitles();
// } );
//
// computed( () => {
//   useAnimateTitles();
// } )
</script>

<style lang="scss">

</style>