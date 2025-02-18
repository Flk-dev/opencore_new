// https://nuxt.com/docs/api/configuration/nuxt-config
export default defineNuxtConfig({
  compatibilityDate: '2024-11-01',
  devtools: { enabled: true },
  vite: {
    css: {
      preprocessorOptions: {
        scss: {
          additionalData: '@use "~/assets/css/variables/_media.scss" as *;'
        }
      }
    }
  },
  css: ['~/assets/css/style.scss'],
  modules: [
    '@pinia/nuxt',
    '@vueuse/nuxt',
    'vue3-perfect-scrollbar/nuxt',
    "nuxt-marquee"
  ],
  runtimeConfig: {
    public: {
      WP_DEV: 'https://klishintest.ru/wp-json/opencore/v1',
      //WP_DEV: 'http://openscrore.local/wp-json/opencore/v1',
    }
  },
})