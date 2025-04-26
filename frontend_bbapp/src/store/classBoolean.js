import { defineStore } from 'pinia'

const useClassBoolean = defineStore('class', {
    state: () => {
        return {
            isActive: false,
            isOpen: false,
            isDelete: false
        }
    },

    actions: {
        changeBoolean() {
            this.isActive = !this.isActive
            console.log(this.isActive)
        },
        open() {
            this.isOpen = true
        },
        close() {
            this.isOpen = false
        },
        delete() {
            this.isDelete = true
        }
    }
})

export default useClassBoolean