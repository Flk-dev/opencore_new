<template>
  <section class="biggest section" v-if="data">
    <div class="biggest__container container">
      <GlobalBlockHeader :title="title" class="mb--40" classses="biggest" class-title="fz-h1--tablet" />
      <div class="biggest__grid">
        <BiggestCard
            v-for="item in data"
            :key="item.post_id"
            :title="item.post_title"
            :subtitle="item.subtitle"
            :text="item.text"
            :logo="item.logo"
        />
      </div>
    </div>
  </section>
</template>

<script setup lang="ts">
defineProps<{
  title?: string,
  data?: object
}>();
</script>

<style scoped lang="scss">
.biggest__grid {
  display: grid;
  grid-template-columns: repeat(2, 1fr);
  gap: 3rem;

  @media (max-width: $tablet) {
    grid-template-columns: 1fr;
  }
}
</style>