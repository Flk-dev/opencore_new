<template>
  <section class="scroll-text" :class="classes + '__scroll-text'">
    <div class="scroll-text__row" v-for="row in data">
      <div class="scroll-text__item fz-h4" v-for="cell in row.cell">
        {{ cell.text }}
      </div>
    </div>
  </section>
</template>

<script setup lang="ts">
defineProps<{
  data: object,
  classes?: string
}>();
</script>

<style scoped lang="scss">
.scroll-text {
  overflow: hidden;
}

.scroll-text__row {
  display: flex;
  align-items: flex-start;
  margin-bottom: 1.8rem;

  &:last-child {
    margin-bottom: 0;
  }
}

.scroll-text__item {
  white-space: nowrap;
  padding: 3rem;
  color: var(--fg-blue);
  border: .15rem solid var(--fg-blue);
  border-radius: var(--br-regular);
  margin-right: 2rem;
  line-height: 60%;
}
</style>