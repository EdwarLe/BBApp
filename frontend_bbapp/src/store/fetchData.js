import { defineStore } from 'pinia'
import { getData, postData } from '../helpers/getAuth'

const useData = defineStore('data', {
    state: () => {
        return {
            data: [],
            dataClients: []
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
            console.log(dataFetch)
        },

        async getDataClients(endPoint) {

            try {
                const dataFetch = await getData(endPoint)
                this.dataClients = await dataFetch.data
            } catch (error) {
                console.log(error)
            }
        }
    }
})

export default useData