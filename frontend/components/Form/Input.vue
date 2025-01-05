<template>
  <div class="form__row">
    <input
        :type="type"
        :name="name"
        class="form__input"
        :placeholder="placeholder"
        :value="value"
        @input="handleInput($event)"
    >
  </div>
</template>

<script setup lang="ts">
const emit = defineEmits(['update:modelValue']);
const props = defineProps<{
  name: string,
  placeholder: string,
  type: string,
  value: string
}>();

const type = ref('text');

if ( props.type ) {
  type.value = props.type;
}

const handleInput = ($event: any) => {
  emit('update:modelValue', $event.target.value)
}
</script>

<style scoped>

</style>