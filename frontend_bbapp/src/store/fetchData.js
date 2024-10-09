import { defineStore } from 'pinia'
import { getData, postData } from '../helpers/getAuth'

const useData = defineStore('data', {
    state: () => {
        return {
            data: []
        }
    },

    actions: {
        async getDataState(endpoint) {

            try {
                const dataFetch = await getData(endpoint)
                this.data = await dataFetch.data
                return
            } catch (error) {
                console.log(`error: ${error}, msg: Usuario o Contraseña errada`)
            }
        },

        async postDataState(endPoint, data) {
            const dataFetch = await postData(endPoint, data)
        }
    }
})

export default useData