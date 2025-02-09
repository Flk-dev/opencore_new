import {initPageIn, initPageLoader, initWords} from "~/utils/pageTransition";

export default () => {
    const nuxtApp = useNuxtApp();

    onMounted( () => {
        initWords();
    } );

    nuxtApp.hook("page:loading:start", () => {
        initPageIn();
    });

    nuxtApp.hook("page:finish", () => {
        initPageLoader();
    });
}