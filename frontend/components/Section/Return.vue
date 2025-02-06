<template>
  <section class="return">
    <div class="return__container container">
      <div class="return__col return__col--first">
        <GlobalBlockHeader :title="title" classes="return" class-title="fz-h1--tablet" />
      </div>
      <div class="return__col return__col--last">
        <h4 class="return__subtitle fz-h4 fz-h2--mobile" v-if="bigText" v-html="bigText"></h4>
        <div class="return__caption fz-caption" v-if="smallText" v-html="smallText"></div>
      </div>
    </div>
  </section>
</template>

<script setup lang="ts">
defineProps<{
  title: string,
  bigText?: string,
  smallText?: string,
}>();
</script>

<style scoped lang="scss">
.return {
  padding: 3rem 0;
  background-color: var(--fg-black);
  color: var(--fg-white);

  @media (max-width: $mobile) {
    padding: 4rem 0;
  }
}

.return__container {
  display: grid;
  grid-template-columns: repeat(2, 1fr);

  @media (max-width: $tablet) {
    grid-template-columns: 1fr;
  }
}

.return__col {
  --border: 1.5px solid var(--fg-white);
  border-top: 1.5px solid var(--fg-white);
  border-right: var(--border);
  padding-top: 3rem;
  min-height: 29rem;

  &--last {
    border-right: none;
    padding-left: 3rem;
  }

  @media (max-width: $tablet) {
    border: none;
    padding: 0 !important;
    min-height: auto;
  }
}

.return__block-header {
  margin-bottom: 0;
  max-width: 68.8rem;

  @media (max-width: $tablet) {
    margin-bottom: 4rem;
  }
}

.return__caption {
  max-width: 47rem;
  margin-top: 2rem;

  @media (max-width: $mobile) {
    max-width: 30rem;
  }
}

.return__subtitle {
  max-width: 64rem;
}
</style>