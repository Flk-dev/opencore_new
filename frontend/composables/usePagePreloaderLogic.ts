import {initPageLoader, initWords} from "~/utils/pageTransition";

export default () => {
    const nuxtApp = useNuxtApp();

    onMounted( () => {
        initWords();
    } );

    nuxtApp.hook("page:finish", () => {
        initPageLoader();
    });
}