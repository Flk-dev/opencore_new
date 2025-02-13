<template>
  <div class="contact-socials" :class="classes" v-if="socials">
    <div class="contact-socials__title fz-h4" v-if="title">{{ title }}</div>
    <div class="contact-socials__list">
      <div class="contact-socials__item" v-for="social in socials">
        <a :href="social.link" class="contact-socials__link fz-h3 fz-h4--tablet">{{ social.text }}</a>
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
defineProps<{
  socials?: object,
  title?: string,
  classes?: string
}>();
</script>

<style scoped lang="scss">
.contacts__socials {
  max-width: 30.3rem;
}

.contact-socials__title {
  margin-bottom: 6rem;
  max-width: 30.3rem;
}

.contact-socials__item {
  margin-bottom: .5rem;
  line-height: 100%;
}

.contact-socials__link {
  color: var(--fg-blue);
  position: relative;

  &::after {
    content: '';
    position: absolute;
    left: 0;
    bottom: 0;
    height: 1.5px;
    width: 0;
    transition: width .5s;
    background-color: var(--fg-blue);
  }

  @media (any-hover: hover) {
    &:hover {
      &::after {
        width: 100%;
      }
    }
  }
}
</style>