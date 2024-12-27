<template>
  {{ data }}

  <div class="methodology__route route" v-if="data.list.length">
    <div class="container">
      <BlockHeader :title="data.title" classes="route" />
      <div class="route__grid">
        <div class="route-item" v-for="(item, dataKey) in data.list" :key="dataKey">
          <div class="route-item__line"></div>
          <div class="route-item__left fz-h3">
            <div class="route-item__counter">{{ dataKey + 1 }}</div>
            <h3 class="route-item__title" v-if="item.title" v-html="item.title"></h3>
          </div>
          <div class="route-item__right">
            <ContentText class="route-item__text" v-if="item.text" :text="item.text" />
            <div class="route-item__accordion accordion" v-if="item.list.length">
              <AccordionItem
                  v-for="(item, key) in item.list"
                  :key="key"
                  :title="item.title"
                  :counter="( dataKey + 1 ) + '.' + ( key + 1 )"
                  :text="item.text"
                  titleClass="fz-h4"

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
}

.route__grid {
  margin-left: var(--m-m-container);
  margin-right: var(--m-m-container);
  border-top: .15rem solid var(--fg-blue);
  padding: 4rem 2rem 0;
}

.route-item {
  display: grid;
  grid-template-columns: repeat(2, 1fr);
  padding-bottom: var(--mt-content-third);
  position: relative;

  &:last-child {
    padding-bottom: 0;
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
}

.route-item__text {
  margin-bottom: 6rem;
}

.route-item__result {
  margin-top: 6rem;
}

.route-item__text {
  --fz: var(--fz-body-b);
  --lh: var(--fz-body-b);
}

.route-item__subtitle {
  margin-bottom: 2rem;
  color: var(--fg-blue);
}
</style>