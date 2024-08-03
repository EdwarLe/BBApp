import { defineStore } from 'pinia'
import { postAuth } from '../helpers/getAuth'

const useAuth = defineStore('auth', {
    state: () => {
        return {
            token: null,
            statusAuth: false,
            userData: {}
        }
    },

    actions: {
        async login(endpoint, dataJson) {
            const dataFetch = await postAuth(endpoint, dataJson)
            const userDataFetched = dataFetch.dataUser.user

            if (dataFetch.status) {
                return false
            } else {
                this.token = dataFetch.dataUser.accessToken
                this.userData = userDataFetched
                return true
            }
        }
    },

    persist: {
        storage: sessionStorage,
        paths: [
            'token',
            'userData'
        ]
    }
})

export default useAuth