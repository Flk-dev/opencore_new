<template>
  <div class="form__row">
    <textarea
        :name="name"
        :placeholder="placeholder"
        :value="value"
        @input="handleInput($event)"
        class="form__input" />
  </div>
</template>

<script setup lang="ts">
const emit = defineEmits(['update:modelValue']);
defineProps<{
  name: string,
  placeholder: string,
  value: string,
}>();

const handleInput = ($event: any) => {
  emit('update:modelValue', $event.target.value)
}
</script>

<style scoped lang="scss">

</style>