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
          <div
              class="learning-we__item"
              v-for="(item, key) in data.list"
              ref="items"
          >
            <div class="learning-we__item-counter fz-h3">{{ getFormatNumber( (key + 1) ) }}</div>
            <div class="learning-we__item-text fz-h3 fz-h2--mobile" v-html="fixText(item.text)"></div>
          </div>
        </div>
        <div class="learning-we__media">
          <div class="learning-we__round">
            <svg width="520" height="520" viewBox="0 0 520 520" fill="none" xmlns="http://www.w3.org/2000/svg" ref="circle">
              <circle cx="260" cy="260" r="259.25" stroke="white" stroke-width="1.5"/>
            </svg>
          </div>
          <div class="learning-we__lines">
            <svg width="520" height="520" viewBox="0 0 520 520" fill="none" xmlns="http://www.w3.org/2000/svg" ref="lines">
              <path data-delay="2" data-sync data-duration="80" d="M260.007 507C281.421 507 298.781 396.414 298.781 260C298.781 123.586 281.421 13 260.007 13C238.592 13 221.232 123.586 221.232 260C221.232 396.414 238.592 507 260.007 507Z" stroke="white" stroke-width="1.24121" stroke-miterlimit="10"/>
              <path data-delay="4" data-sync data-duration="80" d="M260 298.774C396.414 298.774 507 281.414 507 259.999C507 238.585 396.414 221.224 260 221.224C123.586 221.224 13 238.585 13 259.999C13 281.414 123.586 298.774 260 298.774Z" stroke="white" stroke-width="1.24121" stroke-miterlimit="10"/>
              <path data-delay="6" data-sync data-duration="80" d="M434.666 434.624C449.808 419.482 383.888 329.011 287.429 232.551C190.969 136.092 100.498 70.1712 85.3553 85.3136C70.2128 100.456 136.133 190.927 232.593 287.387C329.052 383.846 419.524 449.767 434.666 434.624Z" stroke="white" stroke-width="1.24121" stroke-miterlimit="10"/>
              <path data-delay="8" data-sync data-duration="80" d="M287.429 287.392C383.888 190.933 449.808 100.461 434.666 85.3189C419.524 70.1765 329.052 136.097 232.593 232.556C136.133 329.016 70.2128 419.487 85.3553 434.63C100.498 449.772 190.969 383.852 287.429 287.392Z" stroke="white" stroke-width="1.24121" stroke-miterlimit="10"/>
            </svg>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</template>

<script setup lang="ts">
import Vivus from "vivus";
// import { vIntersectionObserver } from '@vueuse/components'

import { gsap } from "gsap";
import { ScrollTrigger } from "gsap/ScrollTrigger";

defineProps<{
  data: {
    image?: string,
    title: string,
    list: Array<{
      text: string
    }>
  }
}>();

const items: Ref = ref( null );

let tl: any;


gsap.registerPlugin(ScrollTrigger);
ScrollTrigger.defaults({
  markers: false
});

const circle: Ref = ref(null);
const lines: Ref = ref(null);
const vivusCircle: Ref = ref( {} );
const vivusLines: Ref = ref( {} );

onMounted( () => {
  tl = gsap.timeline({
    scrollTrigger: {
      trigger: '.learning-we',
      start: `-20% top`,
      end: `bottom bottom`,
      scrub: false,
      markers: false,
    }
  });

  vivusCircle.value = new Vivus(
      circle.value,
      {
        start: 'manual',
        animTimingFunction: Vivus.EASE,
        pathTimingFunction: Vivus.EASE,
      }
  );

  vivusLines.value = new Vivus(
      lines.value,
      {
        type: 'oneByOne',
        duration: 200,
        delay: .5,
        start: 'manual',
        animTimingFunction: Vivus.EASE,
        pathTimingFunction: Vivus.EASE,
      }
  );

  items.value.forEach( (item: any, index: number) => {
    tl.to( item, {
      opacity: 1,
      duration: .5,
      ease: "Expo.easeOut",
      onEnter: () => {
        if ( index === 0 ) {
          vivusCircle.value.play();
          setTimeout( () => {
            vivusLines.value.play();
          }, 200 )
        }
      }
    } )
  })
} )
</script>

<style scoped lang="scss">
.learning-we__block {
  padding: 3rem 3rem 6rem;
  background: var(--fg-blue);
  color: var(--fg-white);
  border-radius: var(--br-regular);

  @media (max-width: $tablet) {
    padding-bottom: 1rem;
  }
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
  opacity: 0;

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
  width: 52rem;
  height: auto;
  position: relative;

  & svg {
    width: 100%;
    height: 100%;
  }

  @media (max-width: $tablet) {
    order: 1;
    max-width: 52rem;
    margin: 0 auto 6rem;
  }
}

.learning-we__lines {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  width: 100%;
  height: 100%;
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