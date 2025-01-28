<template>
<!--  <button @click="setHeight">FIll</button>-->
<!--  <div class="circle" ref="circle">-->
<!--    <div class="circle__content">-->
<!--      <div class="circle__item">Test 12312321</div>-->
<!--      <div class="circle__item">Test 12312321</div>-->
<!--      <div class="circle__item">Test 12312321</div>-->
<!--      <div class="circle__item">Test 12312321</div>-->
<!--      <div class="circle__item">Test 12312321</div>-->
<!--    </div>-->
<!--  </div>-->


  <div class="career__values career-values page-paddings">
    <div class="career-values__container container">
      <div class="career-values__block" v-if="list">
        <button @click="setHeight">Resize</button>
        <div class="circle">
          <div class="circle__round" :style="{ height: circleHeight + 'px' }">
            <div :style="{ height: height + 'px' }"></div>
          </div>
          <div class="circle__list">
            <div
                class="circle-item"
                v-for="(item, key) in list"
                :class="['circle-item--'+key]"
                ref="items"
                v-intersection-observer="onIntersectionObserver"
            >
              <div class="circle-item__content">
                <h3 class="circle-item__title fz-h4--tablet fz-h2--mobile">
                  {{ item.title }}
                </h3>
                <div class="circle-item__text content__text" v-if="item.text" v-html="item.text"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
import { vIntersectionObserver } from '@vueuse/components'

const list = ref( [
  {
    title: 'Открытость',
    text: 'Мы свободно делимся знаниями и опытом, и открыты новому — это ускоряет наше развитие и помогает эффективно раелизовывать идеи через здоровое общение и совместную работу над общими целями',
  },
  {
    title: 'Открытость',
    text: 'Мы свободно делимся знаниями и опытом, и открыты новому — это ускоряет наше развитие и помогает эффективно раелизовывать идеи через здоровое общение и совместную работу над общими целями',
  },
  {
    title: 'Открытость',
    text: 'Мы свободно делимся знаниями и опытом, и открыты новому — это ускоряет наше развитие и помогает эффективно раелизовывать идеи через здоровое общение и совместную работу над общими целями',
  },
  {
    title: 'Открытость',
    text: 'Мы свободно делимся знаниями и опытом, и открыты новому — это ускоряет наше развитие и помогает эффективно раелизовывать идеи через здоровое общение и совместную работу над общими целями',
  },
  {
    title: 'Открытость',
    text: 'Мы свободно делимся знаниями и опытом, и открыты новому — это ускоряет наше развитие и помогает эффективно раелизовывать идеи через здоровое общение и совместную работу над общими целями',
  },
] );

const items: any = ref(null);
const height: any = ref( 90 );
const circleHeight: any = ref( 90 );

onMounted( () => {
  items.value.forEach((item: any) => {
    height.value += item.getBoundingClientRect().height;
    item.style.opacity = 0;
  });
} )

const onIntersectionObserver = ( [entry]: IntersectionObserverEntry[] ) => {
  if ( entry?.isIntersecting ) {
    entry.target.classList.add('circle-item--active');
    circleHeight.value += (entry.target.getBoundingClientRect().height / 2);
  }
}

</script>

<style scoped lang="scss">
.career-values__block {
  padding: 2.1rem 0;
  background: var(--fg-blue);
  color: var(--fg-white);
  border-radius: var(--br-regular);

  @media (max-width: $tablet) {
    padding: 1.1rem 0;
  }

  @media (max-width: $mobile) {
    margin: 0 var(--m-m-container);
    padding: 2rem 0;
  }
}

.circle {
  position: relative;

  &__list {
    padding: 4.5rem 0;
  }

  &__round {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 0;
    overflow: hidden;
    transition: height .5s;

    & div {
      border: .15rem solid var(--fg-white);
      width: 100%;
      border-radius: 50%;
    }
  }
}

.circle-item {
  border-radius: 50%;
  border: 1.5px solid var(--fg-white);
  width: 87.5rem;
  max-width: 100%;
  height: 23.7rem;
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  margin: 0 auto;
  text-align: center;

  @media (max-width: $tablet) {
    width: 40.7rem;
    height: 14.1rem;
  }

  &--1,
  &--3 {
    width: 135.1rem;
    height: 27.7rem;

    @media (max-width: $tablet) {
      width: 65.2rem;
      height: 14.1rem;
    }

    @media (max-width: $mobile) {
      width: 100% !important;
    }
  }

  &--2 {
    width: 100%;
    height: 27.2rem;

    @media (max-width: $tablet) {
      height: 14.1rem;
    }

    @media (max-width: $mobile) {
      width: 100% !important;
    }
  }

  @media (max-width: $mobile) {
    height: 14.2rem;
    width: 31.6rem;
    padding-left: 2.8rem;
    padding-right: 2.8rem;
  }

  &__content {
    max-width: 51rem;
    margin: 0 auto;
    text-align: center;
  }

  &__text {
    --fz: var(--fz-body-b);
    --lh: var(--lh-body-b);
    color: var(--fg-white-75);
    margin-top: 1rem;

    @media (max-width: $tablet) {
      --fz: 1.2rem;
      --lh: 1.2rem;
      max-width: 31.4rem;
    }
  }

  &--active {
    opacity: 1 !important;
  }
}
</style>