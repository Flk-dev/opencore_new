<template>
  {{ data }}
  <section class="projects section">
    <div class="projects__container container">
      <BlockHeader :title="data.title" classes="projects" />
      <div class="projects__grid parallax">
        <div class="projects__col">
          <div class="projects__left">

          </div>
        </div>
        <div class="projects__col">
          <div class="projects__right">

          </div>
        </div>
      </div>
      <UIButton title="Все проекты" classes="btn--ripple" />
    </div>
  </section>

</template>

<script setup lang="ts">
defineProps<{
  data: {
    title?: string,
    select: object
  }
}>();
</script>

<style scoped lang="scss">

</style>