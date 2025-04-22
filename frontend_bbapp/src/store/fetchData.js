import { defineStore } from 'pinia'
// Los helpers ya son dinámicos, ¡perfecto!
import { getData, postData } from '../helpers/getAuth'

const useData = defineStore('data', {
    // El estado 'data' aquí es menos útil si cada vista maneja sus propios datos.
    // Podrías usarlo para estados globales como 'loading' o 'error' si quisieras.
    state: () => {
        return {
            // data: [], // Comentado o eliminado - Dejaremos que las vistas manejen sus datos específicos
            loading: false, // Opcional: para mostrar indicadores de carga globales
            error: null     // Opcional: para almacenar el último error global
        }
    },

    actions: {
        /**
         * Acción genérica para obtener datos de cualquier endpoint.
         * @param {string} endpoint - El endpoint específico de la API (ej: '/clients', '/sales').
         * @returns {Promise<Array|Object|null>} Los datos obtenidos o null si hubo un error.
         */
        async fetchData(endpoint) {
            this.loading = true; // Opcional: Inicia carga
            this.error = null;   // Opcional: Limpia error previo
            console.log(`Pinia Store: Fetching data from endpoint: ${endpoint}`); // Log para depuración

            try {
                // Llama al helper getData, que ya es dinámico
                const dataFetch = await getData(endpoint);

                // El helper getData devuelve { data, status } o { status, msg }
                if (dataFetch.status && dataFetch.data) {
                    console.log(`Pinia Store: Data received successfully for ${endpoint}`);
                    this.loading = false; // Opcional: Termina carga
                    // RETORNA los datos directamente al componente que llamó la acción
                    return dataFetch.data;
                } else {
                    // Hubo un error manejado dentro de getData (ej: 404, 500 manejado en el helper)
                    console.error(`Pinia Store: Error fetching data from ${endpoint} (handled by helper):`, dataFetch.msg || 'Unknown error from getData helper');
                    this.error = dataFetch.msg || 'Error en la solicitud GET'; // Opcional: Guarda error
                    this.loading = false; // Opcional: Termina carga
                    return null; // Indica fallo al componente
                }
            } catch (error) {
                // Error inesperado durante la ejecución de getData o procesamiento aquí
                console.error(`Pinia Store: Unexpected error fetching data from ${endpoint}:`, error);
                this.error = error; // Opcional: Guarda error
                this.loading = false; // Opcional: Termina carga
                return null; // Indica fallo al componente
            }
        },

        /**
         * Acción genérica para enviar datos (POST) a cualquier endpoint.
         * @param {string} endpoint - El endpoint específico de la API (ej: '/clients', '/sales').
         * @param {object} dataToSend - El objeto de datos a enviar en el cuerpo de la solicitud.
         * @returns {Promise<object|null>} Los datos devueltos por la API tras el POST (ej: el objeto creado) o null si hubo un error.
         */
        async createData(endpoint, dataToSend) {
            this.loading = true; // Opcional
            this.error = null;   // Opcional
            console.log(`Pinia Store: Posting data to endpoint: ${endpoint}`, dataToSend); // Log para depuración

            try {
                // Llama al helper postData, que ya es dinámico
                // Asumiendo que postData devuelve los datos de la respuesta en éxito, o undefined/null en error
                const responseData = await postData(endpoint, dataToSend);

                if (responseData) {
                    console.log(`Pinia Store: Data posted successfully to ${endpoint}:`, responseData);
                    this.loading = false; // Opcional
                    // RETORNA la respuesta directamente al componente
                    return responseData;
                } else {
                    // postData probablemente ya logueó el error, pero indicamos fallo aquí
                    console.error(`Pinia Store: Error posting data to ${endpoint}. Check helper logs.`);
                    this.error = 'Error en la solicitud POST'; // Opcional
                    this.loading = false; // Opcional
                    return null; // Indica fallo al componente
                }

            } catch (error) {
                // Error inesperado durante la ejecución de postData o procesamiento aquí
                console.error(`Pinia Store: Unexpected error posting data to ${endpoint}:`, error);
                this.error = error; // Opcional
                this.loading = false; // Opcional
                return null; // Indica fallo al componente
            }
        }

        // Podrías añadir acciones similares para PUT (updateData) y DELETE (deleteData)
        /*
        async updateData(endpoint, dataToSend) { ... }
        async deleteData(endpoint) { ... }
        */
    }
})

export default useData
