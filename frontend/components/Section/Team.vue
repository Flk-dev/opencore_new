<template>
<section class="team section">
  <div class="team__container container">
    <GlobalBlockHeader :title="title" classes="team" />

    <div class="team__big" v-if="list.big">
      <TeamCard
          v-for="item in list.big"
          :key="item.post_id"
          :name="item.post_title"
          :text="item.text"
          :is-big="item.is_big"
          :post="item.post"
          :image="item.image"
      />
    </div>
    <div class="team__small" v-if="list.small">
      <TeamCard
          v-for="item in list.small"
          :key="item.post_id"
          :name="item.post_title"
          :text="item.text"
          :is-big="item.is_big"
          :post="item.post"
          :image="item.image"
      />
    </div>
  </div>
</section>
</template>

<script setup lang="ts">
const props = defineProps<{
  data: Array<string>;
  title: string;
}>();

const list = ref( {
  big: [],
  small: [],
} );

onMounted( () => {
  props.data.forEach((item: any) => {
    if ( item.is_big ){
      list.value.big.push( item );
    } else {
      list.value.small.push( item );
    }
  });
} )
</script>

<style scoped lang="scss">
.team__block-header {
  margin-bottom: 4rem;
}

.team__big {
  display: grid;
  grid-template-columns: repeat(2, 1fr);
  gap: 3rem;
  
  @media (max-width: $tablet) {
    grid-template-columns: 1fr;
    gap: 7.8rem;
  }

  @media (max-width: $mobile) {
    gap: 8rem;
  }
}

.team__small {
  display: grid;
  grid-template-columns: repeat(5, 1fr);
  row-gap: 6rem;
  column-gap: 2rem;
  margin-top: 8rem;

  @media (max-width: $tablet) {
    grid-template-columns: repeat(2, 1fr);
    row-gap: 2rem;
  }

  @media (max-width: $mobile) {
    grid-template-columns: 1fr;
    row-gap: 3rem;
  }
}
</style>