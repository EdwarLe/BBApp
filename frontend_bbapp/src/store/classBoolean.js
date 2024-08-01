import { defineStore } from 'pinia'

const useClassBoolean = defineStore('class', {
    state: () => {
        return {
            isActive: false
        }
    },

    actions: {
        changeBoolean() {
            this.isActive = !this.isActive
        }
    }
})

export default useClassBoolean