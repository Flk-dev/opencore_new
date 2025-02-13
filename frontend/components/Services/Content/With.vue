<template>
  <div class="service-with" v-if="data.value">
    <div class="service-with__container container">
      <GlobalBlockHeader :title="data.title" classes="service-with" />
      <div class="service-with__list">
        <div class="service-with__row">
          <div 
            class="service-with__item"
            v-for="post in data.value"
            :key="post.post_id"
          >
            <NuxtLink
              class="service-with__link fz-link"
              :to="{ name: 'services-slug', params: { slug: post.post_slug } }"
          >
            {{ post.post_title }}
          </NuxtLink>
          </div>
        </div>
      </div>
      <UIButton title="Все услуги" to="service" />
    </div>
  </div>
</template>

<script setup lang="ts">
defineProps<{
  data: {
    title: string,
    value: Array<string>
  }
}>();
</script>

<style scoped lang="scss">
.service-with {
  margin-top: var(--mt-content-block);

  &__row {
    padding: 3rem 0;
    border-top: .15rem solid var(--fg-black);
    display: grid;
    grid-template-columns: repeat(5, 1fr);
    gap: 3rem;
    margin-bottom: 7rem;
  }

  &__link {
    display: inline-flex;
    color: var(--fg-black);
    border-bottom: 1.5px solid var(--fg-black);
    transition: var(--tr-regular);

    &:hover {
      color: var(--fg-blue);
      border-color: var(--fg-blue);
    }
  }
}
</style>