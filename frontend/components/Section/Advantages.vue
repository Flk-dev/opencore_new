<template>
  <section
      class="advantages section section--blue"
      v-if="select"
      ref="blueSection">
    <div class="advantages__container container">
      <GlobalBlockHeader :title="title" classes="advantages" />
      <div class="advantages__grid">
        <AdvantagesCard
            v-for="item in select"
            :key="item.post_id"
            :title="item.title"
            :icon="item.icon"
            :text="item.text"
        />
      </div>
    </div>
  </section>
</template>

<script setup lang="ts">
defineProps<{
  title?: string,
  select: object
}>();

const blueSection = ref( null );
</script>

<style scoped lang="scss">
.advantages {
  background-color: var(--fg-blue);
  color: var(--fg-white);
}

.advantages__block-header {
  :deep(.block-header__title){
    max-width: 85.8rem;
  }
}

.advantages__grid {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: 4rem;

  @media (max-width: $tablet) {
    grid-template-columns: 1fr;
  }
}
</style>