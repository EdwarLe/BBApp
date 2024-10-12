import { defineStore } from 'pinia'

const useClassBoolean = defineStore('class', {
    state: () => {
        return {
            isActive: false,
            keyComponent: 0
        }
    },

    actions: {
        changeBoolean() {
            this.isActive = !this.isActive
        },

        changeKeyComponent() {
            this.keyComponent += 1
        }
    }
})

export default useClassBoolean