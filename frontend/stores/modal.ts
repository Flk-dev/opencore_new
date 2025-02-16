import { markRaw } from "vue";
import {defineStore} from "pinia";

const lockBody = () => {
    const body = document.querySelector( 'body' );
    if(body){
        body.classList.add( '_lock' );
    }
}

const unLockBody = () => {
    const body = document.querySelector( 'body' );
    if(body){
        body.classList.remove( '_lock' );
    }
}

let timer: TimerHandler;

const isScrollable = () => {
    return new Promise((resolve) => {
        setTimeout(() => {
            const modal: any = document.querySelector(".modal");
            const content: any = modal.querySelector(".modal__content");

            if (content.getBoundingClientRect().height > window.innerHeight) {
                resolve(true );
            } else {
                resolve(false );
            }
        }, 5);
    });
}

export const useModal = defineStore('modal', {
    state: () => ({
        isOpen: false,
        isScrollable: false,
        view: {},
        props: {}
    }),
    actions: {
        open( view: object, props?: object ) {
            this.isOpen = true;
            this.view = {};
            this.props = {};

            clearInterval( timer );

            this.view = markRaw(view);
            if (props){
                this.props = props;
            }

            isScrollable().then((value: boolean) => {
                this.isScrollable = value;
            });

            lockBody();
        },
        close() {
            this.isOpen = false;
            timer = setTimeout( () => {
                this.view = {};
            }, 800 );

            unLockBody();
            //this.props = {};
            //this.isScrollable = false;

            //this.view = {};
        }
    }
})

export default useModal;