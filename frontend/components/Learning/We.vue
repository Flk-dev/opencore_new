<template>
<div
    class="learning__we learning-we"
    v-if="data.list"
>
  <div class="learning__container container">
    <div class="learning-we__block">
      <GlobalBlockHeader :title="data.title" class-title="fz-h1--tablet" />
      <div class="learning-we__content">
        <div class="learning-we__list">
          <div class="learning-we__item" v-for="(item, key) in data.list">
            <div class="learning-we__item-counter fz-h3">{{ getFormatNumber( (key + 1) ) }}</div>
            <div class="learning-we__item-text fz-h3 fz-h2--mobile" v-html="item.text"></div>
          </div>
        </div>
        <div class="learning-we__media">
          <svg width="520" height="520" viewBox="0 0 520 520" fill="none" xmlns="http://www.w3.org/2000/svg" ref="animatedSvg">
            <circle cx="260" cy="260" r="259.25" stroke="white" stroke-width="1.5"/>
            <path d="M260.007 507C281.421 507 298.781 396.414 298.781 260C298.781 123.586 281.421 13 260.007 13C238.592 13 221.232 123.586 221.232 260C221.232 396.414 238.592 507 260.007 507Z" stroke="white" stroke-width="1.24121" stroke-miterlimit="10"/>
            <path d="M260 298.774C396.414 298.774 507 281.414 507 259.999C507 238.585 396.414 221.224 260 221.224C123.586 221.224 13 238.585 13 259.999C13 281.414 123.586 298.774 260 298.774Z" stroke="white" stroke-width="1.24121" stroke-miterlimit="10"/>
            <path d="M260 299.042C396.414 299.042 507 281.682 507 260.267C507 238.852 396.414 221.492 260 221.492C123.586 221.492 13 238.852 13 260.267C13 281.682 123.586 299.042 260 299.042Z" stroke="white" stroke-width="1.24121" stroke-miterlimit="10"/>
            <path d="M260.007 507C281.421 507 298.781 396.414 298.781 260C298.781 123.586 281.421 13 260.007 13C238.592 13 221.232 123.586 221.232 260C221.232 396.414 238.592 507 260.007 507Z" stroke="white" stroke-width="1.24121" stroke-miterlimit="10"/>
            <path d="M260 298.774C396.414 298.774 507 281.414 507 259.999C507 238.585 396.414 221.224 260 221.224C123.586 221.224 13 238.585 13 259.999C13 281.414 123.586 298.774 260 298.774Z" stroke="white" stroke-width="1.24121" stroke-miterlimit="10"/>
            <path d="M434.666 434.624C449.808 419.482 383.888 329.011 287.429 232.551C190.969 136.092 100.498 70.1712 85.3553 85.3136C70.2128 100.456 136.133 190.927 232.593 287.387C329.052 383.846 419.524 449.767 434.666 434.624Z" stroke="white" stroke-width="1.24121" stroke-miterlimit="10"/>
            <path d="M260.007 507C281.421 507 298.781 396.414 298.781 260C298.781 123.586 281.421 13 260.007 13C238.592 13 221.232 123.586 221.232 260C221.232 396.414 238.592 507 260.007 507Z" stroke="white" stroke-width="1.24121" stroke-miterlimit="10"/>
            <path d="M260 298.774C396.414 298.774 507 281.414 507 259.999C507 238.585 396.414 221.224 260 221.224C123.586 221.224 13 238.585 13 259.999C13 281.414 123.586 298.774 260 298.774Z" stroke="white" stroke-width="1.24121" stroke-miterlimit="10"/>
            <path d="M287.429 287.392C383.888 190.933 449.808 100.461 434.666 85.3189C419.524 70.1765 329.052 136.097 232.593 232.556C136.133 329.016 70.2128 419.487 85.3553 434.63C100.498 449.772 190.969 383.852 287.429 287.392Z" stroke="white" stroke-width="1.24121" stroke-miterlimit="10"/>
            <path d="M434.666 434.624C449.808 419.482 383.888 329.011 287.429 232.551C190.969 136.092 100.498 70.1712 85.3553 85.3136C70.2128 100.456 136.133 190.927 232.593 287.387C329.052 383.846 419.524 449.767 434.666 434.624Z" stroke="white" stroke-width="1.24121" stroke-miterlimit="10"/>
          </svg>
        </div>
      </div>
    </div>
  </div>
</div>
</template>

<script setup lang="ts">
import Vivus from "vivus";
import { vElementVisibility } from '@vueuse/components';

defineProps<{
  data: {
    image?: string,
    title: string,
    list: object
  }
}>();

const animatedSvg = ref(null);
const vivus = ref( {} );

onMounted( () => {
  vivus.value = new Vivus(animatedSvg.value, {
    duration: 200,
    animTimingFunction: Vivus.EASE
  });
} )
</script>

<style scoped lang="scss">
.learning-we__block {
  padding: 3rem 3rem 6rem;
  background: var(--fg-blue);
  color: var(--fg-white);
  border-radius: var(--br-regular);
}

.learning-we__content {
  display: flex;
  align-items: flex-start;
  justify-content: space-between;

  @media (max-width: $tablet) {
    flex-direction: column;
  }
}

.learning-we__list {
  max-width: 73.2rem;

  @media (max-width: $tablet) {
    order: 2;
  }
}

.learning-we__item {
  display: flex;
  align-items: flex-start;
  padding: 2rem 0;
  border-top: 1.5px solid var(--fg-white);
  margin-bottom: 4rem;

  &:last-child {
    margin-bottom: 0;
  }

  @media (max-width: $tablet) {
    :deep(br) {
      display: none;
    }
  }
}

.learning-we__media {
  @media (max-width: $tablet) {
    order: 1;
    max-width: 52rem;
    margin: 0 auto 6rem;
  }
}

.learning-we__item-counter {
  min-width: 12.5rem;

  @media (max-width: $tablet) {
    min-width: 6.5rem;
  }

  @media (max-width: $mobile) {
    display: none;
  }
}

</style>