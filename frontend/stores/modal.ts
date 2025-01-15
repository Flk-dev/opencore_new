import { markRaw } from "vue";
import {defineStore} from "pinia";

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
        },
        close() {
            this.isOpen = false;
            this.view = {};
            this.props = {};
        }
    }
})

export default useModal;