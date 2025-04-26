import { defineStore } from 'pinia'

const useDataModals = defineStore('dataModals', {
    state: () => {
        return {
            dataColumnHeaderModals: [],
            dataNameModal: '',
            dataMapModal: []
        }
    },

    actions: {
        setDataColumnHeaderModals(dataColumnHeader, dataNameModal, dataMap) {
            this.dataColumnHeaderModals = dataColumnHeader
            this.dataNameModal = dataNameModal;
            this.dataMapModal = dataMap;
            console.log(this.dataMapModal)
        },
        clearDataModals() {
            this.dataModals = null;
        }
    }
})

export default useDataModals