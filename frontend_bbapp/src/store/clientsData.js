import { defineStore } from 'pinia'
import { getData } from '../helpers/getAuth'

const useClientsData = defineStore('clientData', {
    state: () => {
        return {
            clients: []
        }
    },

    actions: {
        async setArrayClients(endpoint) {
            const dataFetch = await getData(endpoint)
            this.clients = await dataFetch.data

            if (dataFetch.status) {
                console.log(dataFetch.data)
            } else {
                console.log(dataFetch.msg.response.data.message)
            }
        }
    }
})

export default useClientsData