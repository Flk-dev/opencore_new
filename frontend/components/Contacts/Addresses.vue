<template>
  <div class="addresses" :class="classes">
    <div class="addresses-item" v-for="item in items">
      <div class="addresses-item__col">
        <div class="addresses-item__city fz-h3 fz-h1--mobile" v-if="item.city">{{ item.city }}</div>
        <div class="addresses-item__time fz-headline fz-body--mobile" v-if="item.time">{{ item.time }}</div>
      </div>
      <div class="addresses-item__col">
        <div class="addresses-item__coord addresses-item__icon fz-h3 fz-h2--mobile" v-if="item.coordinates">
          <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M26.25 12.4922C26.25 21.2422 15 28.7422 15 28.7422C15 28.7422 3.75 21.2422 3.75 12.4922C3.75 9.5085 4.93526 6.64702 7.04505 4.53724C9.15483 2.42745 12.0163 1.24219 15 1.24219C17.9837 1.24219 20.8452 2.42745 22.955 4.53724C25.0647 6.64702 26.25 9.5085 26.25 12.4922Z" stroke="#0000FF" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
            <path d="M15 18C17.7614 18 20 15.5376 20 12.5C20 9.46243 17.7614 7 15 7C12.2386 7 10 9.46243 10 12.5C10 15.5376 12.2386 18 15 18Z" stroke="#0000FF" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
          </svg>
          <span>{{ item.coordinates }}</span>
        </div>
        <div class="addresses-item__address fz-headline fz-body--mobile" v-if="item.address">{{ item.address }}</div>
      </div>
      <div class="addresses-item__col _last">
        <a :href="'tel:' + item.phone" class="addresses-item__coord addresses-item__icon fz-h3  fz-h2--mobile" v-if="item.phone">
          <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M13.125 1.875H10.3125C9.56658 1.875 8.85121 2.17132 8.32376 2.69876C7.79632 3.22621 7.5 3.94158 7.5 4.6875V25.3125C7.5 26.0584 7.79632 26.7738 8.32376 27.3012C8.85121 27.8287 9.56658 28.125 10.3125 28.125H19.6875C20.4334 28.125 21.1488 27.8287 21.6762 27.3012C22.2037 26.7738 22.5 26.0584 22.5 25.3125V4.6875C22.5 3.94158 22.2037 3.22621 21.6762 2.69876C21.1488 2.17132 20.4334 1.875 19.6875 1.875H16.875M13.125 1.875V2.8125H16.875V1.875M13.125 1.875H16.875M13.125 25.3125H16.875" stroke="#0000FF" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
          </svg>
          <span>{{ item.phone }}</span>
        </a>
      </div>
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
.addresses-item {
  padding: 3rem 0;
  margin-bottom: 9rem;
  border-top: 1.5px solid var(--fg-black);
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: 2rem;

  --icon-width: 3rem;
  --icon-left: 2rem;
  --pd-count: calc( var(--icon-width) + var(--icon-left) );

  @media (max-width: $tablet) {
    grid-template-columns: 4fr 8fr;
    row-gap: 0;
    margin-bottom: 3rem;
  }

  @media (max-width: $mobile) {
    grid-template-columns: 1fr;
    gap: 3rem;

    --icon-left: 1.5rem;
  }

  &:last-child {
    margin-bottom: 0;
  }
}

.addresses-item__time {
  margin-top: 1.5rem;

  @media (max-width: $mobile) {
    margin-top: 1rem;
  }
}

.addresses-item__col._last {
  display: flex;
  align-items: flex-start;
  justify-content: flex-end;

  @media (max-width: $tablet) {
    grid-area: 2/2;
    justify-content: flex-start;
    margin-top: 6rem;
  }

  @media (max-width: $mobile) {
    grid-area: auto;
    margin-top: 0;
  }
}

.addresses-item__icon {
  display: flex;
  align-items: center;

  & span {
    padding-left: var(--icon-left);
  }
}

.addresses-item__address {
  max-width: 43.1rem;
  padding-left: var(--pd-count);
  margin-top: 1.2rem;

  @media (max-width: $mobile) {
    margin-top: 0;
    max-width: 30rem;
  }
}
</style>