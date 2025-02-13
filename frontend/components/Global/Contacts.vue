<template>
  <div class="c-contacts" v-if="contacts">
    <div class="c-contacts__item" v-if="contacts.email">
      <a :href="`mailto:${contacts.email}`" class="c-contacts__link">{{ contacts.email }}</a>
    </div>
    <div class="c-contacts__item"  v-if="contacts.phone">
      <a :href="`tel:${contacts.phone}`" class="c-contacts__link">{{ contacts.phone }}</a>
    </div>
  </div>
</template>

<script setup lang="ts">
const contacts: object = useState('contacts');
</script>

<style scoped lang="scss">
.c-contacts__item:not(:last-child){
  margin-bottom: .7rem;
}

.c-contacts__link {
  font-size: 2.2rem;
  line-height: 120%;
  color: var(--fg-white);
  position: relative;

  &:before {
    content: '';
    position: absolute;
    bottom: -.35rem;
    width: 0;
    height: 1.5px;
    background-color: var(--fg-white);
    left: 0;
    transition: width .5s;
  }

  @media (hover: any-hover) {
    &:hover:before {
      width: 100%;
    }
  }
}
</style>