<template>

</template>

<script setup lang="ts">
const route = useRoute();
const { result: post, error } = await useApi( '/pages/' + route.params.slug + '/', {}, '', true );

console.log( post );
</script>

<style scoped lang="scss">

</style>