<template>
  <div class="modal-history__text">
    <ContentText v-if="props.fullText" :text="typography(props.fullText)" />
  </div>
</template>

<script setup lang="ts">
import Typograf from "typograf";

const { props } = useModal();
const tp = new Typograf({locale: ['ru', 'en-US']});
const typography = ( text: any ) => {
  return tp.execute( text );
}

</script>

<style scoped lang="scss">
.modal-history__text {
  max-width: 60rem;
  margin: 0 auto;
}
</style>