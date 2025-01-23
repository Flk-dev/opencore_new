<template>
  <section class="scroll-text" :class="classes + '__scroll-text'">
    <Vue3Marquee
        class="scroll-text__row"
        v-for="( row, key ) in data"
        :key="key"
        :direction="key % 2 === 0 ? 'reverse' : 'normal'"
        :duration="key % 2 === 0 ? 30 : 40"
        :clone="true"
    >
      <div class="scroll-text__item fz-h4 fz-h2--mobile" v-for="cell in row.cell">
        {{ cell.text }}
      </div>
    </Vue3Marquee>
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
  margin: 0 var(--m-m-container)
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