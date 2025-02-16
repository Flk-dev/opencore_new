import {defineStore} from "pinia";

const scrollPos = ref( 0 );

export const useHeader = defineStore('header', {
    state: () => ({
        isHide: false,
        headerHeight: 0
        //isFixed: false,
        //isWhite: false
    }),
    actions: {
        scroll( event: any ) {
            if ((document.body.getBoundingClientRect()).top > scrollPos.value){
                this.isHide = false;
            } else {
                this.isHide = true;
            }

            scrollPos.value = (document.body.getBoundingClientRect()).top;
        },
    }
})