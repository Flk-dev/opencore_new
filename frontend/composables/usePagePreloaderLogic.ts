import {initPageIn, initPageLoader, initWords} from "~/utils/pageTransition";

export default () => {
    const nuxtApp = useNuxtApp();

    onMounted( () => {
        initWords();
    } );

    nuxtApp.hook("page:start", () => {
        initPageIn();
    });

    nuxtApp.hook("page:finish", () => {
        setTimeout( () => {
            initPageLoader();
        }, 3000 );
    });
}