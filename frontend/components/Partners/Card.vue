<template>
  <div class="partners-item">
    <div class="partners-item__top">
      <div class="partners-item__category" v-if="categories">
        <p v-for="category in categories">{{ category.name }}</p>
      </div>
      <NuxtLink :to="{ name: 'partners-slug', params: { slug: slug } }" class="partners-item__header">
        <h3 class="partners-item__title fz-h1--mobile animate animate__fadeIn" v-animate>
          <span v-html="title" class="_up"></span>
        </h3>
        <div class="partners-item__icon">
          <svg width="39" height="39" viewBox="0 0 39 39" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M33.0547 33.5215L32.7296 11.6561C32.7099 10.3306 31.1065 9.68041 30.1691 10.6178L6.60438 34.1825L5.35547 32.9336L28.99 9.29908C29.917 8.37209 29.2924 6.78564 27.9823 6.73936L5.47756 5.94431L6.98222 4.43966L32.9326 5.35643L34.1815 6.60534L34.5594 32.0168L33.0547 33.5215Z" fill="#0000FF"/>
          </svg>
        </div>
      </NuxtLink>
      <div class="partners-item__description content__text" v-if="description" v-html="fixText( description )"></div>
    </div>
    <UIButton
        title="Подробнее"
        class="partners-item__more btn--size-xs btn--border"
        :to="{ name: 'partners-slug', params: { slug: slug } }"
    />
  </div>

</template>

<script setup lang="ts">
interface Cats {
  name: string
}

defineProps<{
  id: number,
  title: string,
  description?: string,
  slug: string,
  categories?: Array<Cats>
}>();
</script>

<style scoped lang="scss">
.partners-item {
  display: flex;
  flex-direction: column;
  justify-content: space-between;

  &__category {
    padding-bottom: 2rem;
    border-bottom: .15rem solid var(--fg-blue);
    margin-bottom: 2rem;
    color: var(--fg-blue);
  }

  &__header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 6rem;

    @media (max-width: $mobile) {
      margin-bottom: 2rem;
    }
  }

  &__title {
    max-width: 37.2rem;
    color: var(--fg-blue);

    @media (max-width: $mobile) {
      max-width: 30.1rem;
    }
  }

  &__description {
    --fz: var(--fz-h4);
    --lh: var(--lh-h4);

    --pd-ul-icon: 1rem;
    --mb-ul-li: 2rem;

    font-family: var(--ff-extended);

    @media (max-width: $tablet) {
      :deep(br) {
        display: none;
      }
    }

    @media (max-width: $mobile) {
      --fz: var(--fz-h2);
      --lh: var(--lh-h2);
      letter-spacing: var(--lc-h2);

      --mb-ul-li: 1.5rem;
      --top-ul-icon: .6rem;
    }
  }

  &__more {
    margin-top: 4rem;

    @media (max-width: $mobile) {
      margin-top: 2rem;
      border-radius: 1rem;
    }
  }

  &__icon {
    & svg {
      width: 3.9rem;
      height: auto;
    }
  }
}
</style>