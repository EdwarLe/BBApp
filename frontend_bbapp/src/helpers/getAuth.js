import axios from 'axios'

const BASE_URL = 'http://localhot:8000/api/v1'

export const postAuth = async (endPoint, dataJson) => {
    const response = await axios.post(BASE_URL + endPoint, dataJson)
    console.log(response)
}