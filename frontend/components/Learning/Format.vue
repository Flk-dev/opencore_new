<template>
  <div class="learning__format learning-format" v-if="data.list">
    <div class="learning__container container">
      <div class="learning-format__grid">
        <div class="learning-format__col" v-for="item in data.list">
          <GlobalBlockHeader :title="item.title"  classes="learning-format" class-title="fz-h1--tablet fz-h1--mobile" />
          <div :class="{ 'learning-format__item': true, '_blue': item.is_blue }">
            <h3 class="learning-format__item-title fz-h3 fz-h1--mobile" v-if="item.subtitle" v-html="item.subtitle"></h3>
            <div class="learning-format__item-text content__text" v-if="item.text" v-html="fixText(item.text)"></div>
          </div>
        </div>
      </div>
      <UIButton
          title="Связаться с нами"
          class="learning-format__btn"
          @click="modal.open( ModalsLearningCallUs, {
            title: 'Хотите пройти обучение?',
            text: 'Заполните форму, чтобы мы помогли вам выбрать оптимальный формат обучения и согласовать все детали.',
          } )"
      />
    </div>
  </div>
</template>

<script setup lang="ts">
import {ModalsLearningCallUs} from "#components";

interface List {
  title: string,
  is_blue: boolean,
  subtitle?: string,
  text?: string
}

defineProps<{
  data: {
    list: Array<List>
  }
}>();

const modal = useModal();
</script>

<style scoped lang="scss">
.learning-format__grid {
  display: grid;
  grid-template-columns: repeat(2, 1fr);
  gap: 1rem;

  @media (max-width: $tablet) {
    grid-template-columns: 1fr;
    gap: 8rem;
  }

  @media (max-width: $tablet) {
    gap: 6rem;
  }
}

.learning-format__block-header {
  margin-bottom: 6rem;

  @media (max-width: $tablet) {
    margin-bottom: 4rem;
  }

  @media (max-width: $mobile) {
    margin-bottom: 3rem;
  }
}

.learning-format__item {
  padding: 3rem;
  border: 1.5px solid var(--fg-blue);
  color: var(--fg-blue);
  min-height: 35rem;
  display: flex;
  flex-direction: column;
  justify-content: space-between;
  border-radius: var(--br-regular);

  &._blue {
    color: var(--fg-white);
    background: var(--fg-blue);

    :deep(ul li:before){
      background: var(--fg-white);
    }
  }


  @media (max-width: $tablet) {
   min-height: 30rem;
  }

  @media (max-width: $mobile) {
    min-height: 25rem;
    padding: 3rem 2rem;
  }

  &-text {
    --fz: var(--fz-body-b);
    --lh: var(--fz-body-b);
    --mb-ul-li: 1rem;
    --top-ul-icon: .8rem;

    @media (max-width: $tablet) {
      :deep(ul) {
        max-width: 80%;
      }
    }

    @media (max-width: $mobile) {
      --mb-ul-li: 1.5rem;
      --top-ul-icon: .6rem;
    }    
  }
}

.learning-format__btn {
  margin-top: 2rem;

  @media (max-width: $tablet) {
    margin-top: 8rem;
  }

  @media (max-width: $mobile) {
    margin-top: 6rem;
  }   
}
</style>