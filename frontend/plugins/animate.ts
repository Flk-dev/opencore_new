export default defineNuxtPlugin((nuxtApp) => {
    nuxtApp.vueApp.directive('animate', {
        mounted(el, binding) {
            const item = ref( el );

            const { stop } = useIntersectionObserver(
                item,
                ([entry], observerElement) => {
                    if ( entry?.isIntersecting ){
                        el.classList.add( "animate--animated" );
                    }
                },
            )
        },
    });
});