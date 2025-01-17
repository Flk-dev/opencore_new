import { markRaw } from "vue";
import {defineStore} from "pinia";

const lockBody = () => {
    if ( document.querySelector( 'body' ) ) {
        document.querySelector( 'body' ).classList.add( '_lock' );
    }
};

const unlockBody = () => {
    if ( document.querySelector( 'body' ) ) {
        document.querySelector( 'body' ).classList.remove( '_lock' );
    }
};

export const useModal = defineStore('modal', {
    state: () => ({
        isOpen: false,
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

            lockBody();
        },
        close() {
            this.isOpen = false;
            this.view = {};
            this.props = {};

            unlockBody();
        }
    }
})

export default useModal;