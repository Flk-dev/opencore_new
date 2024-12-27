<template>
  <div class="case-tasks">
    <div class="case-tasks__container container">
      <div class="case-tasks__left" v-if="data.tasks.length">
        <div class="case-tasks__title fz-caption">Задачи</div>
        <div class="case-tasks__list">
          <div class="case-tasks__item fz-body" v-for="(item, key) in data.tasks" :key="key">{{ item.text }}</div>
        </div>
      </div>
      <div class="case-tasks__right">
        <div class="case-tasks__title fz-caption">О компании</div>
        <ContentText class="case-tasks__text" :text="data.text" />
        <div class="case-tasks__flex">
          <UIRoundVideo :preview="data.video_preview" :link="data.video_link" classes="case-tasks__video" />
          <div class="case-tasks__subtext fz-caption" v-if="data.video_text" v-html="data.video_text"></div>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
defineProps<{
  data: {
    tasks?: object,
    text?: string,
    video_preview?: string,
    video_link?: string,
    video_text?: string,
  }
}>();
</script>

<style scoped lang="scss">
.case-tasks {
  margin-top: 8rem;
}

.case-tasks + ::v-deep .content {
  --mt-block: 8rem;
}

.case-tasks__container {
  display: flex;
  align-items: flex-start;
  justify-content: space-between;

  @media (max-width: $tablet) {
    flex-direction: column;
    justify-content: flex-start;
  }
}

.case-tasks__title {
  color: var(--fg-blue);
  margin-bottom: 3rem;

  @media (max-width: $tablet) {
    margin-bottom: 2.7rem;
  }

  @media (max-width: $mobile) {
    margin-bottom: 1.5rem;
  }
}

.case-tasks__item {
  margin-bottom: .9rem;

  &:last-child {
    margin-bottom: 0;
  }
}

.case-tasks__left {
  width: 40.6rem;
  max-width: 100%;

  @media (max-width: $tablet) {
    width: 100%;
  }
}

.case-tasks__right {
  width: calc(100%  - 40.6rem);
  padding-left: 9.4rem;

  @media (max-width: $tablet) {
    width: 100%;
    padding-left: 0;
    margin-top: 9rem
  }

  @media (max-width: $mobile) {
    margin-top: 6rem;
  }
}

.case-tasks__flex {
  margin-top: 4rem;
  display: flex;
  align-items: center;
}

.case-tasks__subtext {
  max-width: 27.4rem;
  color: #111111;
  opacity: .5;
  margin-left: 1.9rem;
}

.case-tasks__text {
  --fz: 2.8rem;
  --lh: 130%;

  @media (max-width: $mobile) {
    --fz: 1.8rem;
    --lh: 125%;
  }
}

</style>