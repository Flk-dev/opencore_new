<template>

  <div class="accordion-item" @click="open" :class="{ 'accordion-item--white': isWhite, '_active': active }">
    <div class="accordion-item__head" v-if="title">
      <div class="accordion-item__head-left" :class="titleClass">
        <div class="accordion-item__counter" v-if="counter">{{ counter }}</div>
        <div class="accordion-item__title fz-h2--mobile" v-html="title"></div>
      </div>
      <div class="accordion-item__icon">
        <svg width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M11.5652 14.4806L1 14.4806V13.9106L11.5652 13.9106C12.9099 13.9106 14 12.8205 14 11.4758V1L14.5968 1V11.4758C14.5968 12.8205 15.6869 13.9106 17.0315 13.9106L27.5 13.9106V14.4806L17.0315 14.4806C15.6868 14.4806 14.5968 15.5707 14.5968 16.9154L14.5968 27.5L14 27.5L14 16.9154C14 15.5707 12.9099 14.4806 11.5652 14.4806Z" fill="#0C0C0C" stroke="#111111"/>
        </svg>
      </div>
    </div>
    <div class="accordion-item__body" v-if="text">
      <div class="accordion-item__content">
        <div class="accordion-item__list" v-if="isArray( text )">
          <div
              v-for="( gridItem, gridKey ) in text"
              class="accordion-item__grid"
              :class="{ '_2': gridItem.is_two_colums ? gridItem.is_two_colums : false }"
              :key="gridKey"
          >
            <div
                class="accordion-item__text"
                v-for="( textItem, key ) in gridItem.texts"
                :key="key"
            >
              <ContentText :text="textItem.text" />
            </div>
          </div>
        </div>
        <div v-else class="accordion-item__text">
          <ContentText :text="text" />
        </div>
        <UIButton
            v-if="isMore"
            :to="to"
            title="Подробнее"
            class="accordion-item__button btn--white btn--size-xs"
        />
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
const props = defineProps<{
  classes?: string,
  title: string,
  text: string,
  counter?: string,
  titleClass?: string,
  isMore?: boolean,
  to?: string,
  isWhite?: boolean,
  isTwoColumns?: boolean,
}>();

const active = ref(false);
const open = () => {
  active.value = ! active.value;
}

const titleClass = ref( 'fz-h3' );
if ( props.titleClass ) {
  titleClass.value = props.titleClass;
}

const isArray = ( value ) => {
  if ( Array.isArray( value ) ) {
    return true;
  }

  return false;
};

</script>

<style scoped lang="scss">
.accordion-item {
  padding: 2rem;
  border-top: 1.5px solid var(--fg-black);
  --m-bottom: 3rem;
  margin-bottom: var(--m-bottom);
  transition: var(--tr-regular);

  $root: &;

  &__head {
    display: flex;
    align-items: center;
    justify-content: space-between;
    cursor: pointer;
    text-align: left;
    width: 100%;

    &-left {
      display: flex;
      align-items: flex-start;
    }
  }

  &__counter {
    min-width: 4.7rem;
    margin-right: 3.3rem;
    transition: var(--tr-regular);
  }

  &__icon {
    & svg,
    & path {
      transition: var(--tr-regular);
    }
  }

  &__body {
    opacity: 0;
    position: relative;
    z-index: 1;
    overflow: hidden;
    width: 100%;
    grid-template-rows: 0fr;
    display: grid;
    transition: all 0.4s;

    & > * {
      min-height: 0;
      transition: var(--tr-regular);
    }
  }

  &__text {
    max-width: 41.3rem;
    color: var(--fg-white-75);

    :deep( .content__text ) {
      --fz: var(--fz-body-b);
      --lh: var(--lh-body-b);
    }
  }

  &__button {
    margin-top: 3rem;
  }

  @media (any-hover: hover) {
    &:hover:not(._active) {
      border-color: var(--fg-blue);

      #{$root}__head {
        & path {
          stroke: var(--fg-blue);
        }
      }

      #{$root}__title {
        color: var(--fg-blue);
        transition: var(--tr-regular);
      }

      #{$root}__counter {
        color: var(--fg-blue);
      }
    }
  }

  &._active {
    background: var(--fg-blue);
    border-color: var(--fg-blue);
    color: var(--fg-white);

    #{$root}__icon svg {
      transform: rotate(-45deg);
    }

    #{$root}__icon svg path {
      fill: var(--fg-white);
      stroke: var(--fg-white);
    }

    #{$root}__body {
      opacity: 1;
      grid-template-rows: 1fr;
    }

    #{$root}__content {
      padding-top: 2rem;
    }
  }

  &--white {
    #{$root}__head {
      align-items: center;
    }

    &._active {
      background: var(--fg-white) !important;
      color: var(--fg-blue) !important;

      #{$root}__icon svg path {
        fill: var(--fg-blue);
        stroke: var(--fg-blue);
      }

      #{$root}__text {
        color: var(--fg-black);
      }
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

  &__grid {
    display: grid;
    gap: 2rem;
    margin-bottom: 3rem;

    & #{$root}__text {
      max-width: 100%;
    }

    &:last-child {
      margin-bottom: 0;
    }

    &._2 {
      grid-template-columns: repeat(2, 1fr);
    }
  }
}

</style>