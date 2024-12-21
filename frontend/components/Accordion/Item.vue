<template>
  <div class="accordion-item" @click="open" :class="{ '_active': active }">
    <div class="accordion-item__head" v-if="title">
      <div class="accordion-item__title fz-h3" v-html="title"></div>
      <div class="accordion-item__icon">
        <svg width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M11.5652 14.4806L1 14.4806V13.9106L11.5652 13.9106C12.9099 13.9106 14 12.8205 14 11.4758V1L14.5968 1V11.4758C14.5968 12.8205 15.6869 13.9106 17.0315 13.9106L27.5 13.9106V14.4806L17.0315 14.4806C15.6868 14.4806 14.5968 15.5707 14.5968 16.9154L14.5968 27.5L14 27.5L14 16.9154C14 15.5707 12.9099 14.4806 11.5652 14.4806Z" fill="#0C0C0C" stroke="#111111"/>
        </svg>
      </div>
    </div>
    <div class="accordion-item__body" v-if="text">
      <div class="accordion-item__content">
        <div class="accordion-item__text" v-html="text"></div>
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
defineProps<{
  classes?: string,
  title: string,
  text: string
}>();

const active = ref(false);
const open = () => {
  active.value = ! active.value;
}
</script>

<style scoped lang="scss">
.accordion-item {
  padding: 2rem;
  border-top: .15rem solid var(--fg-black);
  --m-bottom: 3rem;
  margin-bottom: var(--m-bottom);
  transition: var(--tr-regular);

  &._active {
    background: var(--fg-blue);
    border-color: var(--fg-blue);
    color: var(--fg-white);

    & .accordion-item__icon svg {
      transform: rotate(-45deg);
    }

    & .accordion-item__icon svg path {
      fill: var(--fg-white);
      stroke: var(--fg-white);
    }

    & .accordion-item__body {
      opacity: 1;
      grid-template-rows: 1fr;
    }

    & .accordion-item__content {
      padding-top: 2rem;
    }
  }

  &:last-child {
    margin-bottom: 0;

    @media (max-width: $tablet) {
      margin-bottom: var(--m-bottom);
    }
  }

  @media (max-width: $mobile) {
    padding: 2rem 1rem;
    margin-bottom: 1.5rem;
  }
}

.accordion-item__head {
  display: flex;
  align-items: flex-start;
  justify-content: space-between;
  cursor: pointer;
  text-align: left;
  width: 100%;
}

.accordion-item__icon {
  & svg {
    transition: var(--tr-regular);
  }
  margin-top: .7rem;
}

.accordion-item__body {
  opacity: 0;
  position: relative;
  z-index: 1;
  overflow: hidden;
  width: 100%;
  grid-template-rows: 0fr;
  display: grid;
  transition: all 0.4s;
}

.accordion-item__body > * {
  min-height: 0;
  transition: var(--tr-regular);
}

.accordion-item__text {
  max-width: 41.3rem;
  color: var(--fg-white-75);
}

.accordion-item__button {
  display: inline-block;
  margin-top: 3rem;
  padding: 1.3rem 2rem;
  font-size: var(--fz-caption);
  color: var(--fg-white);
  border: .15rem solid var(--fg-white);
  border-radius: 1.5rem;
}


@media (max-width: $mobile) {
  .accordion-item__title {
    font-size: 2rem;
    line-height: 100%;
    letter-spacing: -.02rem;
  }
}

</style>