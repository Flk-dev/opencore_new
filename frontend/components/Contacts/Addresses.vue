<template>
  <div class="contact-addresses" :class="classes">
    <div class="contact-addresses__item" v-for="item in items">
      <div class="contact-addresses__col">
        <div class="contact-addresses__city contact-addresses__big">{{ item.city }}</div>
        <div class="contact-addresses__time" v-if="item.time">{{ item.time }}</div>
      </div>
      <div class="contact-addresses__col" v-if="item.address">
        <div class="contact-addresses__address">
          <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M26.25 12.4922C26.25 21.2422 15 28.7422 15 28.7422C15 28.7422 3.75 21.2422 3.75 12.4922C3.75 9.5085 4.93526 6.64702 7.04505 4.53724C9.15483 2.42745 12.0163 1.24219 15 1.24219C17.9837 1.24219 20.8452 2.42745 22.955 4.53724C25.0647 6.64702 26.25 9.5085 26.25 12.4922Z" stroke="#0000FF" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
            <path d="M15 18C17.7614 18 20 15.5376 20 12.5C20 9.46243 17.7614 7 15 7C12.2386 7 10 9.46243 10 12.5C10 15.5376 12.2386 18 15 18Z" stroke="#0000FF" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
          </svg>

        </div>
      </div>
      <div class="contact-addresses__col"></div>
    </div>
  </div>
</template>

<script setup lang="ts">
defineProps<{
  items: object,
  classes?: string
}>();
</script>

<style scoped lang="scss">

</style>