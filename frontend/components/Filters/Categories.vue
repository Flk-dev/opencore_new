<template>

  <div class="cats__menu">
    <div class="cats__menu-container container">
      <div class="cats__menu-list" v-if="categories.length">
        <button class="cats__menu-link _active" data-id="all">Все</button>
        <template v-for="category in categories">
          <button class="cats__menu-link" data-id="{{ category.term_id }}">{{ category.name }}</button>
        </template>
      </div>
    </div>
  </div>

</template>

<script setup>
const props = defineProps( {
  type: String
} );

const { result: categories, error } = await useApi( '/' + props.type + '/categories', {}, 'blog/categories' );
</script>

<style scoped lang="scss">
.cats__menu {
  margin-bottom: 2rem;
}

.cats__menu-list {
  display: flex;
  align-content: center;
}

.cats__menu-link {
  padding: 0 2rem;
  font-size: var(--fz-caption);
  border: .15rem solid var(--fg-black);
  border-radius: 1.5rem;
  min-height: 4.1rem;
  display: flex;
  align-items: center;
  justify-content: center;
  transition: var(--tr-regular);
  margin-right: 1rem;

  &:last-child {
    margin-right: 0;
  }

  &._active {
    border-color: var(--fg-blue);
    color: var(--fg-white);
    background: var(--fg-blue);
  }

  &:hover:not(._active) {
    border-color: var(--fg-blue);
    color: var(--fg-blue);
  }
}
</style>