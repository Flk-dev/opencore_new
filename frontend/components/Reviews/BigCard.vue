<template>
  <div class="reviews-item">
    <div class="reviews-item__title fz-h3 fz-h2--mobile" v-html="title"></div>
    <div class="reviews-item__content">
      <div class="reviews-item__text" v-if="text" v-html="text"></div>
      <div class="reviews-item__client">
        <div class="reviews-item__client-logo" ref="refLogo">
          <img v-if="logo" :src="logo">
        </div>
        <div class="reviews-item__client-content" v-if="name || post">
          <div class="reviews-item__client-name" v-if="name">{{ name }}</div>
          <div class="reviews-item__client-post fz-caption" v-if="post" v-html="post"></div>
        </div>
      </div>

      <NuxtLink v-if="cases" ref="refCase" class="reviews-item__case fz-caption" :to="{name: 'cases-slug', params: {slug: cases.post_name}}">
        смотреть кейс
      </NuxtLink>
    </div>
  </div>
</template>

<script setup lang="ts">
defineProps<{
  title: string,
  text?: string,
  name?: string,
  post?: string,
  logo?: string,
  cases?: object
}>();

const refCase = ref( null );
const refLogo = ref( null );
// const changeCursor = ( event: any ) => {
//   const rect = refLogo.value.getBoundingClientRect();
//   const x = event.clientX; // получаем координату X мыши
//   const y = event.clientY;
//
//   // const x = event.clientX;
//   // const y = event.screenY;
//   //
//   // const rect = refLogo.value.getBoundingClientRect();
//   //
//   // console.log( rect );
//
//   // console.log( event.clientY, event.clientX );
//   //
//   // const rect = refLogo.value.getBoundingClientRect();
//   // //
//   // // const offLeft = x - rect.left;
//   // // const offTop = y - rect.top;
//   // // //
//   // // refCase.value.$el.style.left = offLeft + 'px';
//   //refCase.value.$el.style.top = ( y - rect.top) + 'px';
// };
//
// // const setActive = () => {
// //   refCase.value.$el.style.opacity = 1;
// // }
</script>

<style scoped lang="scss">
.reviews-item__case {
  position: absolute;
  transform: translate(-50%, -50%);
  background: var(--fg-blue);
  color: var(--fg-white);
  height: 3.1rem;
  display: flex;
  align-items: center;
  justify-content: center;
  padding: 0 1rem;
  border-radius: 1rem;
  opacity: 0;
  z-index: 5;
  transition: opacity .3s;
}

.reviews-item {
  padding: 3rem;
  border: .15rem solid var(--fg-blue);
  border-radius: var(--br-regular);
  display: flex;
  flex-direction: column;
  justify-content: space-between;
  min-height: 55.5rem;
  height: 100%;

  @media (max-width: $mobile) {
    min-height: 44rem;
  }
}

.reviews-item__title {
  color: var(--fg-blue);
}

.reviews-item__content {
  min-height: 37.8rem;
  display: flex;
  flex-direction: column;
  justify-content: space-between;
  margin-top: 3rem;

  @media (max-width: $mobile) {
    min-height: 31.3rem;
  }
}

.reviews-item__client {
  display: flex;
  align-items: center;
  position: relative;
}

.reviews-item__client-logo {
  min-width: 8.8rem;
  margin-right: 1.5rem;

  & img {
    border-radius: var(--br-regular);
  }

  @media (max-width: $mobile) {
    min-width: 6rem;
    max-width: 6rem;
  }
}

.reviews-item__client-name {
  color: var(--fg-black);
}

.reviews-item__client-post {
  color: var(--fg-gray-2);
  margin-top: 1rem;

  @media (max-width: $mobile) {
    font-size: 1.2rem;
    line-height: 110%;
    margin-top: .5rem;

    & br {
      display: none;
    }
  }
}

</style>