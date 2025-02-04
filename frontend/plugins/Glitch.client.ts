import GlitchedElement from 'vue-powerglitch';

export default defineNuxtPlugin((nuxtApp) => {
    nuxtApp.vueApp.use(GlitchedElement, { name: 'GlitchedElement' })
})