<template>
  <div class="methodology__route route" v-if="data.list.length">
    <div class="container">
      <GlobalBlockHeader :title="data.title" classes="route" class-title="fz-h1" />
      <div class="route__grid">
        <div class="route-item" v-for="(item, dataKey) in data.list" :key="dataKey">
          <div class="route-item__line"></div>
          <div class="route-item__left fz-h3">
            <div class="route-item__counter fz-h1--mobile">{{ dataKey + 1 }}</div>
            <h3 class="route-item__title fz-h1--mobile" v-if="item.title" v-html="item.title"></h3>
        </div>
        <div class="route-item__right">
          <div class="route-item__text">
            <ContentText v-if="item.text" :text="item.text" />
            <RoundVideo class="route-item__video" :preview="item.video_preview" :link="item.video"  />
          </div>
            <div class="route-item__accordion accordion" v-if="item.list.length">
              <AccordionItem
                  v-for="(list, key) in item.list"
                  :key="key"
                  :title="list.title"
                  :counter="( dataKey + 1 ) + '.' + ( key + 1 )"
                  :text="list.text"
                  title-class="fz-h4"
                  is-white="true"
                  class="_small"
              />
            </div>
            <div class="route-item__result" v-if="item.result">
              <div class="route-item__subtitle fz-h4">Результат</div>
              <ContentText class="route-item__text" :text="item.result" />
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
import RoundVideo from "~/components/Global/RoundVideo.vue";

defineProps<{
  data: {
    title: string,
    list: object
  }
}>();
</script>

<style scoped lang="scss">
.route {
  margin-top: var(--mt-content-block);
}

.route__block-header {
  justify-content: flex-end;
  padding-right: 4.6rem;
}

.route__grid {
  margin-left: var(--m-m-container);
  margin-right: var(--m-m-container);
  border-top: .15rem solid var(--fg-blue);
  padding: 4rem 2rem 0;

  @media (max-width: $tablet) {
    padding: 0;
    border-top: 0;
    margin-left: 0;
    margin-right: 0;
  }
}

.route-item {
  display: grid;
  grid-template-columns: repeat(2, 1fr);
  padding-bottom: var(--mt-content-third);
  position: relative;

  &:last-child {
    padding-bottom: 0;
  }

  @media (max-width: $tablet) {
    grid-template-columns: 1fr;
    gap: 4rem;
    padding: 2rem 0;
    border-top: .15rem solid var(--fg-black);
  }
}

.route-item__line {
  position: absolute;
  top: -4rem;
  left: 50%;
  transform: translateX(-50%);
  width: .15rem;
  height: calc(100% + 4rem);
  background-color: var(--fg-blue);

  @media (max-width: $tablet) {
    display: none;
  }
}

.route-item__left {
  display: flex;
  align-items: flex-start;
}

.route-item__title {
  margin-left: 1.7rem;
  max-width: 53rem;
}

.route-item__right {
  padding-left: 5.8rem;

  @media (max-width: $tablet) {
    padding-left: 0;
  }
}

.route-item__text {
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

  @media (max-width: $tablet) {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
  }

  @media (max-width: $mobile) {
    flex-direction: column;
    justify-content: flex-start;
  }
}

.route-item__result {
  margin-top: 6rem;

  @media (max-width: $mobile) {
    margin-top: 2rem;
  }
}

.route-item__subtitle {
  margin-bottom: 2rem;
  color: var(--fg-blue);
}

.route-item__video {
  position: absolute;
  left: -9.5rem;
  top: 0;
  min-width: 7.5rem;
  height: 7.5rem;

  :deep(.video-round__play) {
    max-width: 1.9rem;
  }

  @media (max-width: $tablet) {
    position: relative;
    left: 0;
    top: 0;
    min-width: 9rem;
    height: 9rem;
    max-width: 9rem;
  }

  @media (max-width: $mobile) {
    margin-top: 2rem;
  }
}
</style>