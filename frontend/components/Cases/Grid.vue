<template>
  <div
      class="cases__parallax parallax"
      v-if="columns.value.colLeft.length"
      ref="grid"
      v-intersection-observer="onIntersectionObserver"
  >
    <div class="cases__line"></div>
    <div class="cases__grid">
      <div class="cases__col">
        <div ref="colLeft">
          <CasesCard
              v-for="item in columns.value.colLeft"
              :key="item.post_id"
              :title="item.post_title"
              :image="item.image"
              :categories="item.categories"
              :subtitle="item.subtitle"
              :slug="item.post_slug",
              :add-border="item.add_border"
          />
        </div>
      </div>
      <div class="cases__col cases__col--right">
        <div ref="colRight" v-if="columns.value.colRight.length">
          <CasesCard
              v-for="item in columns.value.colRight"
              :key="item.post_id"
              :title="item.post_title"
              :image="item.image"
              :categories="item.categories"
              :subtitle="item.subtitle"
              :slug="item.post_slug"
              :add-border="item.add_border"
          />
        </div>
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
import { vIntersectionObserver } from '@vueuse/components';
import { gsap } from "gsap";
import { ScrollTrigger } from "gsap/ScrollTrigger";

const props = defineProps<{
  data: object
}>();

const windowWidth = ref( 0 );
const setWindowWidth = () => {
  windowWidth.value = window.innerWidth;
}

onMounted( () => {
  setWindowWidth();
  window.addEventListener('resize', setWindowWidth);

  gsap.registerPlugin(ScrollTrigger);
  ScrollTrigger.defaults({
    markers: false
  });

  let tl = gsap.timeline({
    scrollTrigger: {
      trigger:".cases__grid",
      start:"top top",
      end:"bottom bottom",
      scrub: true,
      markers: true
    }
  });

  tl.to('.cases__col--right', {
    duration: 2,
    y: -250,
}, 0);
} )

const columns = computed(() => {
  const data: object = ref({
    colLeft: [],
    colRight: [],
  });

  if (props.data) {
    if (windowWidth.value < 992) {
      data.value.colLeft = props.data;
      data.value.colRight = [];
    } else {
      props.data.forEach((element: Array<string>, index: number) => {
        index += 1;
        if (index % 2 === 0) {
          data.value.colRight.push(element);
        } else {
          data.value.colLeft.push(element);
        }
      });
    }
  }

  return data;
});

const grid: any = ref( null );
const colLeft: any = ref( null );
const colRight: any = ref( null );

/*const onScroll = () => {
  if ( ! colRight.value || ! colLeft.value ) {
    return;
  }

  const leftRect = colLeft.value.getBoundingClientRect();
  const rightRect = colRight.value.getBoundingClientRect();
  const gridRect = grid.value.getBoundingClientRect();

  const travel = leftRect.height - rightRect.height
  const offsetTop = gridRect.top + window.scrollY;
  const cols = grid.value.getBoundingClientRect().height - window.innerHeight;
  const interval = cols / travel;

  const scrolled: any = document.scrollingElement.scrollTop;

  const e = Math.round( ( scrolled ) - offsetTop ) / interval;
  const b = scrolled >= ( leftRect.top + window.scrollY ) + rightRect.height - window.innerHeight;

  if ( scrolled >= offsetTop && b == false ) {
    colRight.value.style.transform = "translate3d(0px, " + ( e ) + "px, 0px)";
  }
}*/

const onIntersectionObserver = ([entry]: IntersectionObserverEntry[]) => {
  if (entry?.isIntersecting) {
    grid.value.classList.add('cases__grid--active');
  }
}

</script>

<style scoped lang="scss">
.cases__parallax {
  margin: 0 calc( -1 * var(--p-container) );
  position: relative;

  &:before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 0;
    border-bottom: 1.5px solid var(--fg-blue);
    transition: width 3s;

    @media (max-width: $tablet) {
      display: none;
    }
  }
}

.cases__grid {
  display: flex;

  &--active:before {
    width: 100%;
  }

  @media (max-width: $tablet) {
    flex-direction: column;
    margin: 0;
  }
}

.cases__line {
  position: absolute;
  left: 50%;
  transform: translateX(-50%);
  top: 0;
  border-right: 1.5px solid var(--fg-blue);
  height: 100%;
  transition: height 3s;

  @media (max-width: $tablet) {
    display: none;
  }
}

.cases__col {
  &:first-child {
    :deep(.cases-item:nth-child(2n + 1)) {
      max-width: 52rem;
      margin-left: auto;
      --image-height: 31rem;
    }
  }

  &:last-child {
    :deep(.cases-item:nth-child(2n + 2)) {
      max-width: 52rem;
      --image-height: 31rem;
    }
  }
}

.cases__col {
  width: 50%;
  padding: 2rem 1.5rem 0 var(--p-container);
  position: relative;

  @media (max-width: $tablet) {
    padding: 0 var(--p-container)
  }

  &:last-child {
    padding-left: 1.5rem;
    padding-right: var(--p-container);

    &:after {
      display: none;
    }

    & .cases-item._small {
      margin-left: 0;
    }
  }

  @media (max-width: $tablet) {
    width: 100%;
    border-top: none;
  }

  @media (max-width: $mobile) {

  }
}
</style>