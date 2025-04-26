import { defineStore } from 'pinia'

const useDataRowToEdit = defineStore('dataRowToEdit', {
    state: () => {
        return {
            dataRowToEdit: {},
            isData: false
        }
    },

    actions: {
        setDataRowToEdit(dataRow) {
            this.dataRowToEdit = dataRow;
            this.isData = true;
            console.log(this.dataRowToEdit)
        },
        clearDataRowToEdit() {
            this.dataRowToEdit = null;
            this.isData = false;
        }
    }
})

export default useDataRowToEdit