<template>
  <div class="team-item" :class="{ 'team-item--big': isBig }">
    <div class="team-item__media item--cover" v-if="image">
      <img :src="image" :alt="name">
    </div>
    <div class="team-item___main">
      <div class="team-item__post" v-if="post">{{post}}</div>
      <div class="team-item__name" :class="isBig ? 'fz-h3 fz-h2--mobile' : 'fz-caption'" v-if="name">{{ name }}</div>
    </div>
    <div class="team-item__text fz-caption" v-if="isBig && text" v-html="text"></div>
  </div>
</template>

<script setup lang="ts">
defineProps<{
  image: string;
  name: string;
  post: string;
  text?: string;
  isBig: boolean
}>();
</script>

<style scoped lang="scss">
.team-item {
  &__media {
    height: 35.3rem;
    border-radius: 1.1rem;
    overflow: hidden;
    margin-bottom: 2rem;

    & img {
      filter: grayscale(100%);
      transition: all .3s;

      @media (max-width: $mobile) {
        object-position: top center;
      }
    }

    @media (max-width: $mobile) {
      height: auto;
      padding-bottom: 100%;
    }
  }

  &:hover {
    & img {
      filter: grayscale(0);
    }
  }

  &__post {
    font-size: 1.2rem;
    line-height: 110%;
    margin-bottom: .5rem;
    color: var(--fg-black-75);
  }

  &___main {
    display: flex;
    flex-direction: column;
  }

  &__text {
    margin-top: 3.5rem;
    max-width: 30.7rem;

    @media (max-width: $mobile) {
      max-width: 41.7rem;
    }

    @media (max-width: $mobile) {
      margin-top: 1.5rem;
      max-width: 100%;
    }
  }

  &--big {
    & .team-item__media {
      height: 55rem;
      margin-bottom: 2.5rem;

      @media (max-width: $tablet) {
        height: 61rem;
      }

      @media (max-width: $tablet) {
        height: auto;
        padding-bottom: 100%;
      }
    }

    & .team-item__name {
      order: 1;
    }

    & .team-item__post {
      order: 2;
      font-size: 2rem;
      margin-top: 1rem;
      
      @media (max-width: $mobile) {
        font-size: var(--fz-body-b);
        line-height: var(--lh-body-b);
      }
    }
  }
}

</style>