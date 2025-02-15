<template>
  <footer
      class="footer section--blue"
  >
    <div class="footer__container container">
      <div class="footer__main">
        <div class="footer__main-left">
          <div class="footer__subscribe">
            <div class="footer__subscribe-title footer__title fz-h4">Подписаться</div>
            <div class="footer__subscribe-form">
              <input type="text" class="footer__subscribe-input" placeholder="Email">
              <button class="footer__subscribe-btn">
                <svg width="26" height="27" viewBox="0 0 26 27" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M20.824 17.4301L13.0636 26.5H15.4822L25.5401 14.7449C25.8369 14.398 26 13.9565 26 13.5C26 13.0435 25.8369 12.602 25.5401 12.2551L15.4822 0.5L13.0636 0.5L20.824 9.56992C21.9082 10.8371 21.0078 12.7926 19.3401 12.7926L0 12.7926L0 14.2074L19.3401 14.2074C21.0078 14.2074 21.9082 16.1629 20.824 17.4301Z" fill="white"/>
                </svg>
              </button>
            </div>
            <div class="footer__alert">
              <a href="https://www.instagram.com/opencore.pro/" target="_blank">Opengram</a>,
              <a href="https://vc.ru/u/425675-opencorepro" target="_blank">VC</a>,
              <a href="https://www.facebook.com/opencore.pro/" target="_blank">Openbook</a>
            </div>
          </div>
          <div class="footer__menu">
            <div class="footer__menu-title footer__title fz-h4">Скачать</div>
            <ul class="footer__menu-list">
              <li><a href="https://docs.google.com/presentation/d/1HEDmV_cndZI31hM3_7NcQ9TBGkuppdsvpoUGWY93tPI/edit#slide=id.g31ddfd66591_4_131" target="_blank">Презентация короткая</a></li>
              <li><a href="https://docs.google.com/presentation/d/1nPQGKjcZ8FQlO6KBkMsGpT3s7DQdVS2DIaWtLzA1OyY/edit" target="_blank">Презентация полная</a></li>
              <li><a href="https://drive.google.com/drive/u/0/folders/1CgSvbnT-ZM3zjIiGOE5pEcMY2hffQ6EF" target="_blank">Форма брифа</a></li>
            </ul>
          </div>
        </div>
        <div class="footer__main-right footer__contacts" v-if="contacts.email || contacts.phone">
          <div class="footer__contacts-item" v-if="contacts.email">
            <a :href="'mailto:' + contacts.email" class="footer__contacts-link">{{ contacts.email }}</a>
          </div>
          <div class="footer__contacts-item" v-if="contacts.phone">
            <a :href="'tel:'+ contacts.phone" class="footer__contacts-link">{{ contacts.phone }}</a>
          </div>
        </div>
      </div>
      <div class="footer__logo">
        <picture class="footer__logo-pic">
          <img src="/img/logo-white.svg" class="footer__logo-img">
        </picture>
      </div>
    </div>
  </footer>
</template>

<script setup lang="ts">
interface Contacts {
  email?: string,
  phone?: string
}

const contacts = useState<Contacts>('contacts');
</script>

<style scoped lang="scss">
.footer {
  padding: 6rem 0 2.5rem;
  background: var(--fg-blue);
  color: var(--fg-white);

  @media (max-width: $mobile) {
    padding: 3rem 0 2rem;
  }

  &__main {
    display: flex;
    align-items: flex-start;
    justify-content: space-between;

    @media (max-width: $tablet) {
      flex-wrap: wrap;
    }

    &-left {
      display: flex;
      align-items: flex-start;

      @media (max-width: $mobile) {
        flex-wrap: wrap;
      }
    }
  }

  &__title {
    margin-bottom: 2.8rem;

    @media (max-width: $mobile) {
      margin-bottom: 1.3rem;
    }
  }

  &__alert {
    margin-top: 3rem;

    & a {
      position: relative;

      &:after {
        content: '';
        position: absolute;
        left: 0;
        bottom: -.1rem;
        width: 0;
        border-bottom: 1.5px solid var(--fg-white);
        transition: width .3s;
      }

      &:hover:after {
        width: 100%;
      }
    }

    @media (max-width: $mobile) {
      margin-top: 2rem;
    }
  }

  &__logo {
    margin-top: 3.5rem;

    @media (max-width: $tablet) {
      margin-top: 3rem;
    }

    &-img {
      width: 100%;
      height: auto;
    }
  }

  &__menu {
    margin-left: 21.5rem;

    @media (max-width: $mobile) {
      margin-left: 0;
      margin-top: 3.5rem;
    }

    &-list {
      list-style: none;
      padding: 0;
      margin: 0;

      & li {
        margin-bottom: .9rem;

        &:last-child {
          margin-bottom: 0;
        }

        & a {
          display: inline-block;
          color: var(--fg-white);
          position: relative;

          &:before {
            content: '';
            position: absolute;
            bottom: -.3rem;
            left: 0;
            width: 0;
            height: 1.5px;
            background: var(--fg-white);
            transition: width .3s;
          }

          &:hover:before {
            width: 100%;
          }
        }
      }
    }
  }
}
</style>