import {defineStore} from "pinia";
import luBody from "~/utils/lockUnlockBody";

const useMenu = defineStore('menu', {
    state: () => ({
        isOpen: false,
    }),
    actions: {
        open() {
            this.isOpen = true;
            luBody();
        },
        close() {
            this.isOpen = false;
            luBody();
        }
    }
})

export default useMenu;