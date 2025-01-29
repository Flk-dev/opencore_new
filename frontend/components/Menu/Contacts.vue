<template>
  <div class="short-contacts">
    <div class="short-contacts__item">
      <a href="mailto:info@opencore.pro" class="short-contacts__link short-contacts--email fz-headline">info@opencore.pro</a>
    </div>
    <div class="short-contacts__item">
      <a href="tel:79857734805" class="short-contacts__link short-contacts--phone fz-headline">+7 985 773-48-05</a>
    </div>
  </div>
</template>

<script setup lang="ts">

</script>

<style scoped lang="scss">
.short-contacts {
  &__item {
    margin-bottom: 1.2rem;

    &:last-child {
      margin-bottom: 0;
    }
  }

  &__link {
    position: relative;
    display: inline-block;

    &:before {
      content: '';
      position: absolute;
      bottom: -.4rem;
      left: 0;
      width: 0;
      height: 1.5px;
      background: var(--fg-white);
      transition: width 0.3s ease;
    }

    &:hover:before {
      width: 100%;
    }
  }
}
</style>