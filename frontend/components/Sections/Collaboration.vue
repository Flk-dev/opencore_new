<template>
  <section class="collaborate section" v-if="collaborate.data.list.length">
    <div class="collaborate__container container">
      <BlockHeader title="Уже сотрудничаем<br> с классными ребятами" classes="collaborate" />
      <div class="collaborate__slider">
        <div class="collaborate__swiper swiper">
          <div class="swiper-wrapper">
            <div class="swiper-slide" v-for="collaborate in collaborate.data.list">
              <div class="collaborate__item">
                <img :src="collaborate" alt="">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>

<script setup >
const { result: collaborate } = await useApi( '/template/partners/collaborate', {}, 'partners/collaborate' );
</script>

<style scoped lang="scss">

</style>