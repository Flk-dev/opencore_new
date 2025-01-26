import { markRaw } from "vue";
import {defineStore} from "pinia";

const lockUnlockBody = () => {
    document.querySelector( 'body' ).classList.toggle( '_lock' );
};

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
            this.view = markRaw(view);
            if (props){
                this.props = props;
            }

            isScrollable().then((value: boolean) => {
                this.isScrollable = value;
            });

            lockUnlockBody();
        },
        close() {
            this.isOpen = false;
            this.view = {};
            this.props = {};
            this.isScrollable = false;

            lockUnlockBody();
        }
    }
})

export default useModal;