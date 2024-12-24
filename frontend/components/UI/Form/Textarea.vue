<template>
  <div class="form__row">
    <textarea :name="name" :placeholder="placeholder" class="form__input"></textarea>
  </div>
</template>

<script setup lang="ts">
const props = defineProps<{
  name: string,
  placeholder: string,
}>();
</script>

<style scoped lang="scss">

</style>