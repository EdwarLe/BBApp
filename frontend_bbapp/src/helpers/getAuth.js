import axios from 'axios'

const BASE_URL = 'http://127.0.0.1:8000/api/v1'

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
                message: 'No hay datos para mostrar',
                status: true
            }
        }
    }
}

export const getData = async (endPoint) => {
    const uri = BASE_URL + endPoint

    try {
        const { data } = await axios.get(uri)

        return {
            data,
            status: true
        }
    } catch (error) {
        console.log(error)
        return {
            status: false,
            msg: error
        }
    }
}

export const postData = async (endPoint, dataJson) => {
    const uri = BASE_URL + endPoint

    try {
        const { data } = await axios.post(uri, dataJson)
        return data
    } catch (error) {
        console.log(error)
    }
}