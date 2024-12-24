<template>
  <div class="form__row">
    <input :type="type" :name="name" class="form__input" :placeholder="placeholder">
  </div>
</template>

<script setup lang="ts">
const props = defineProps<{
  name: string,
  placeholder: string,
  type: string
}>();

const type = ref('text');

if ( props.type ) {
  type.value = props.type;
}
</script>

<style scoped>

</style>