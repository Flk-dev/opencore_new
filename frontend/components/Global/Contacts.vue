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
}
</style>