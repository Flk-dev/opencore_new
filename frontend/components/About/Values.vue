<template>
  <div class="about__values about-values">
    <div class="container">
      <GlobalBlockHeader :title="data.title" classes="about-values" />
      <div class="about-values__list" v-if="data.select">
        <div
            class="about-values__item"
            v-for="(item, key) in data.select"
            :key="item.post_id"
            :class="key === 0 ? 'about-values__item--active' : ''"
            ref="items"
        >
            <div class="about-values__item-icon" v-if="item.icon">
              <img :src="item.icon" :alt="item.post_title" />
            </div>
            <div class="about-values__item-content">
              <div class="about-values__item-title fz-h3 fz-h2--mobile" v-if="item.post_title" v-html="item.post_title"></div>
              <div class="about-values__item-text" v-if="item.text" v-html="fixText( item.text )"></div>
            </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
import { gsap } from "gsap";
import { ScrollTrigger } from "gsap/ScrollTrigger";


defineProps<{
  data: {
    title?: string,
    select?: Array<{
      post_id: number,
      icon: string,
      post_title: string,
      text: string
    }>
  }
}>();

gsap.registerPlugin(ScrollTrigger);
ScrollTrigger.defaults({
  markers: true
});

const items = ref( null );
const spacer = ref( 100 );

onMounted( () => {
  gsap.fromTo(
    ".about-values__item",
    {
      x: () => '500%',
      //y: '-100%',
    },
    {
      x: 0,
      stagger: 0.5,
      scrollTrigger: {
        pin: ".about-values .container",
        markers: true,
        scrub: true,
        start: "top top",
        end: `${window.innerHeight * 5} bottom`,
      }
    }
  );
} )
</script>

<style scoped lang="scss">
.about-values {
  overflow: hidden;

  @media (max-width: $mobile) {
    padding-bottom: 18rem;
  }
}

.about-values__block-header {
  margin-bottom: 4rem;
}

.about-values__list {
  display: flex;
  align-items: flex-start;

  @media (max-width: $mobile) {
    flex-direction: column;
  }
}

.about-values__item {
  --width: 37.9rem;
  --coef: 12.4rem;

  min-width: var(--width);
  max-width: var(--width);
  background: var(--fg-white);
  border: 1px solid var(--fg-blue);
  border-radius: var(--br-regular);
  padding: 3rem;
  display: flex;
  flex-direction: column;
  justify-content: space-between;
  min-height: 36rem;
  margin-right: calc( -1 * ((var(--width) - var(--coef)) - var(--coef)));
  //opacity: 0;
  //transform: translateX(100%);
  transition: all .7s;

  &--active {
    opacity: 1;
    transform: translateX(0);
  }

  &-icon {
    min-height: 10rem;
  }

  &-content {
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    min-height: 10rem;
  }

  &-text {
    font-size: var(--fz-link);
    line-height: 120%;

    @media (max-width: $mobile) {
      font-size: var(--fz-body-b);
      line-height: var(--lh-body-b);
    }
  }
  
  @media (max-width: $tablet) {
    --coef: 4.2rem;
  }

  @media (max-width: $mobile) {
    --coef: 7.6rem;
    --width: 100%;

    margin-right: 0;
    margin-bottom: calc( -1 * ((var(--width) - var(--coef)) - var(--coef)));
    min-height: 26rem;
    transform: translateX(0) translateY(100%);

    &--active {
        opacity: 1;
        transform: translateY(0);
    }

    & img {
      max-height: 7rem;
    }
  }
}
</style>