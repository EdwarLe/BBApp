import { defineStore } from 'pinia'
import { postAuth } from '../helpers/getAuth'

const useAuth = defineStore('auth', {
    state: () => {
        return {
            token: null,
            statusAuth: false,
            userData: {
                userName: '',
                userSurname: '',
                userEmail: '',
                userRole: 0,
                userId: 0,
                userStatusDeleted: null,
                createdAt: '',
                updatedAt: ''
            }
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
                this.userData.userName = userDataFetched.name
                this.userData.userSurname = userDataFetched.surname
                this.userData.userEmail = userDataFetched.email
                this.userData.userRole = userDataFetched.role
                this.userData.userId = userDataFetched.id
                this.userData.userStatusDeleted = userDataFetched.deleted_at
                this.userData.createdAt = userDataFetched.created_at
                this.userData.updatedAt = userDataFetched.updated_at
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