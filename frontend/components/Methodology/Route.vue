<template>
  <div class="methodology__route route" v-if="data.select.length">
    <div class="container">
      <GlobalBlockHeader :title="data.title" classes="route" class-title="fz-h1" />
      <div class="route__grid" ref="grid">
        <div class="route__col route__left">
          <div class="route__line route__line--first"></div>
          <div
              class="route__titles"
              :style="{top: (!isHide ? (headerHeight + 10) : 20) + 'px'}"
          >
            <div
                class="route__titles-item"
                v-for="(item, dataKey) in data.select"
                :key="dataKey"
                :data-id="dataKey"
                :class="{ 'route__titles-item--active': dataKey === 0 }"
                ref="titles"
            >
              <div class="route__titles-counter fz-h3 fz-h1--mobile">{{ dataKey + 1 }}</div>
              <h3 class="route__titles-title fz-h1--mobile" v-if="item.post_title" v-html="fixText(item.post_title)"></h3>
            </div>
          </div>
          <div class="route__line route__line--last"></div>
        </div>
        <div class="route__col route__right">
          <div class="route__line route__line--first"></div>
          <div class="route__line route__line--vertical"></div>
          <div class="route__row">
            <div
                class="route-item"
                v-for="(item, dataKey) in data.select"
                :key="dataKey"
                :data-id="dataKey"
                ref="items"
            >
              <div class="route-item__text">
                <ContentText v-if="item.text" :text="fixText(item.text)" />
                <GlobalRoundVideo class="route-item__video _tablet" v-if="item.video_preview && item.video_link" :preview="item.video_preview" :link="item.video_link"  />
              </div>
              <div class="route-item__accordion accordion" v-if="item.list.length">
                <AccordionItem
                    v-for="(list, key) in item.list"
                    :key="key"
                    :title="list.title"
                    :counter="( dataKey + 1 ) + '.' + ( key + 1 )"
                    :text="list.list"
                    :is-two-column="list.is_two_colums"
                    title-class="fz-h4"
                    :is-white="true"
                    class="_small route-item__accordion-item"
                />
              </div>
              <div class="route-item__result" v-if="item.result">
                <div class="route-item__subtitle fz-h4 fz-h1--mobile">Результат</div>
                <div class="route-item__text">
                  <ContentText :text="fixText(item.result)" />
                </div>
              </div>
            </div>
          </div>
          <div class="route__line route__line--last"></div>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
import { gsap } from "gsap";
import { ScrollTrigger } from "gsap/ScrollTrigger";
import {useHeader} from "~/stores/header";

interface Select {
  post_title?: string,
  video_preview?: string,
  video_link?: string,
  text: string[],
  list: Array<{
    title: string,
    list: string[],
    is_two_colums: boolean
  }>,
  result?: string
}

defineProps<{
  data: {
    title: string,
    select: Array<Select>
  }
}>();

const grid: Ref = ref( null );
const { height: gridHeight } = useElementSize( grid );

const items: Ref = ref( null );
const titles: Ref = ref( null );

const iniItems = () => {
  items.value.forEach((item: any) => {
    ScrollTrigger.create({
      trigger: item,
      start: 'top top',
      end: 'bottom 20%+=100px',
      onEnter: () => {
        initTitle( item.dataset.id );
      },

      onEnterBack: () => {
        initTitle( item.dataset.id );
      }
    });
  })
}

const initTitle = ( id: number ) => {
  const title = titles.value.filter((item: any) => item.dataset.id === id);
  titles.value.forEach((item: any) => item.classList.remove( 'route__titles-item--active' ));
  title[0].classList.add( 'route__titles-item--active' );
}

onMounted( () => {
  iniItems();
} )

const store = useHeader();
const isHide = computed(() => store.isHide);
const headerHeight = computed(() => store.headerHeight);
</script>

<style scoped lang="scss">
.route {
  margin-top: var(--mt-content-block);

  &__block-header {
    justify-content: flex-end;
    padding-right: 4.6rem;
  }

  &__grid {
    margin-left: var(--m-m-container);
    margin-right: var(--m-m-container);
    //border-top: 1.5px solid var(--fg-blue);
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    position: relative;

    @media (max-width: $tablet) {
      padding: 0;
      border-top: 0;
      margin-left: 0;
      margin-right: 0;
    }
  }

  &__col {
    position: relative;
    padding: 0 var(--p-container);
  }

  &__left {
    padding-top: 4rem;
    padding-bottom: 4rem;
  }

  &__right {
    padding-left: 5.7rem;
  }

  &__line {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: .15rem;
    background: var(--fg-blue);

    &--last {
      top: auto;
      bottom: 0;
    }

    &--vertical {
      width: .15rem;
      height: 100%;
      left: 0;
    }
  }
}

.route__titles {
  padding: 4rem 0;
  position: sticky;
  top: 2rem;
  transition: all .3s;
  overflow: hidden;

  &-item {
    display: flex;
    align-items: flex-start;
    position: absolute;
    top: 0;
    left: 0;
    margin-top: -10rem;
    transition: margin-top .5s;

    &--active {
      margin-top: 0;
    }
  }

  &-title {
    margin-left: 1.7rem;
    max-width: 53rem;
  }
}

.route-item {
  padding-bottom: var(--mt-content-third);
  position: relative;

  &:first-child {
    padding-top: 4rem;
  }

  &:last-child {
    padding-bottom: 4rem;
  }

  @media (max-width: $tablet) {
    grid-template-columns: 1fr;
    gap: 4rem;
    padding: 2rem 0 12rem;
    border-top: 1.5px solid var(--fg-black);
  }

  @media (max-width: $mobile) {
    gap: 2rem;
    padding-bottom: 8rem;
  }

  &__line {
    position: absolute;
    top: -4rem;
    left: 50%;
    transform: translateX(-50%);
    width: 1.5px;
    height: calc(100% + 4rem);
    background-color: var(--fg-blue);

    @media (max-width: $tablet) {
      display: none;
    }
  }

  &__left {
    display: flex;
    align-items: flex-start;
  }

  &__right {
    padding-left: 5.8rem;

    @media (max-width: $tablet) {
      padding-left: 0;
    }
  }

  &__sticky {
    display: flex;
    align-items: flex-start;
    position: sticky;
    top: 5rem;
  }

  &__subtitle {
    margin-bottom: 2rem;
    color: var(--fg-blue);
  }

  &__text {
    margin-bottom: 6rem;
    position: relative;

    & :deep(.content__text) {
      --fz: var(--fz-body-b);
      --lh: var(--lh-body-b);

      @media (max-width: $tablet) {
        padding-right: 2rem;
      }

      @media (max-width: $mobile) {
        padding-right: 0;
      }
    }

    &:last-child {
      margin-bottom: 0;
    }

    @media (max-width: $tablet) {
      display: flex;
      justify-content: space-between;
      align-items: flex-start;
    }

    @media (max-width: $mobile) {
      flex-direction: column;
      justify-content: flex-start;
      margin-bottom: 2rem;
    }
  }

  &__result {
    margin-top: 6rem;

    @media (max-width: $mobile) {
      margin-top: 2rem;
    }
  }

  &__video {
    position: absolute;
    right: -16.4rem;
    top: 0;
    --width: 7.5rem;

    &._tablet {
      display: none;
    }

    :deep(.video-round__play svg) {
      max-width: 1.4rem;
    }

    @media (max-width: $tablet) {
      position: relative;
      left: 0;
      top: 0;
      min-width: 9rem;
      height: 9rem;
      max-width: 9rem;
      display: none;

      &._tablet {
        display: block;
      }
    }

    @media (max-width: $mobile) {
      margin-top: 2rem;
    }
  }

  &__accordion-item {
    padding-left: 0;
    padding-right: 0;
    border-top: none;
    border-bottom: 1.5px solid var(--fg-black);

    @media (max-width: $mobile) {
      :deep( .accordion-item__icon ) {
        --width: 2rem;
      }

      :deep( .accordion-item__title ) {
        padding-right: 1.5rem;
      }
    }

    &._active {
      :deep(.accordion-item__content) {
        padding-top: 4rem;
      }
    }

    :deep( .content__text ){
      --fz: var(--fz-caption);
      --lh: var(--lh-caption);
      --top-ul-icon: .7rem;

      @media (max-width: $mobile) {
        --top-ul-icon: .5rem;
      }
    }
  }
}
</style>