<template>
  <section class="scroll-text" :class="classes + '__scroll-text'">
    <NuxtMarquee
        class="scroll-text__row"
        v-for="( row, key ) in data"
        :key="key"
        :direction="key === 1 ? 'right' : 'left'"
        :speed="listKey === 1 ? 75 : 90"
        :pauseOnHover="true"
    >
      <div class="scroll-text__item fz-h4 fz-h2--mobile" v-for="cell in row.cell">
        {{ cell.text }}
      </div>
    </NuxtMarquee>
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
  margin: -1rem var(--m-m-container);
}

.scroll-text__row {
  display: flex;
  align-items: flex-start;
  margin-bottom: .8rem;
  padding: 1rem 0;
  overflow: hidden;

  &:last-child {
    margin-bottom: 0;
  }
}

.scroll-text__item {
  white-space: nowrap;
  padding: 3rem;
  color: var(--fg-blue);
  border: 1.5px solid var(--fg-blue);
  border-radius: var(--br-regular);
  margin-right: 2rem;
  line-height: 60%;

}
</style>