import axios from 'axios'

const BASE_URL = 'http://localhost:8000/api/v1'

export const postAuth = async (endPoint, dataJson) => {
    const uri = BASE_URL + endPoint

    try {
        const { data } = await axios.post(uri, dataJson)
        return {
            dataUser: data,
            status: false
        }
    } catch (error) {
        if (!error.response.data.status) {
            return {
                message: 'Usuario o contraseña errado',
                status: true
            }
        }

    }



}