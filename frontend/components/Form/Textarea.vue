<template>
  <div class="form__row">
    <textarea
        :name="name"
        :placeholder="placeholder"
        :value="value"
        @input="handleInput($event)"
        class="form__input"
        ref="textarea"
        :style="{ minHeight: height + 'px' }"
    />
    <div class="form__placholder-hide" ref="placeholerRef" v-html="placeholder"></div>
  </div>
</template>

<script setup lang="ts">
const emit = defineEmits(['update:modelValue']);
defineProps<{
  name: string,
  placeholder: string,
  value: string,
}>();

const textarea = ref(null);
const placeholerRef = ref( null );

const { height } = useElementBounding( placeholerRef );

const handleInput = ($event: any) => {
  emit('update:modelValue', $event.target.value)
}
</script>

<style scoped lang="scss">
.form__placholder-hide {
  position: absolute;
  top: 0;
  opacity: 0;
  visibility: hidden;
  padding: 3rem 2rem 2rem;
  color: var(--fg-black);
  font-size: 2.2rem;
  z-index: -1;
}
</style>