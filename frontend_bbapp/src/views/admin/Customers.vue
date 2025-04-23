<template>
    <section class="w-full h-[90%] overflow-hidden pt-3 shadow-lg">
        <section class=" w-full h-full flex flex-col gap-2 items-center justify-start">
            <h3 class="text-xl font-semibold text-indigo-800 mb-2">Gestión de Clientes</h3>
            <button
                class="place-self-end mr-4 mb-2 bg-indigo-800 text-white px-4 py-1.5 rounded-full transition-colors border border-transparent shadow-md hover:bg-slate-100 hover:text-indigo-800 hover:border-indigo-800 text-sm font-medium"
                @click="handleShowModal"
            >
                + Nuevo Cliente
            </button>
            <section class="w-full flex flex-col gap-4 justify-start items-center h-full overflow-y-scroll p-4 md:p-8 scroll-bar">
                <p v-if="dataStore.loading" class="text-gray-500 mt-10">Cargando, por favor espere...</p>
                <p v-if="dataStore.error" class="text-red-500 mt-10">Error al cargar datos: {{ dataStore.error }}</p>
                <TableData v-else
                    :tableData="clients"
                    :columnsHeader='columnsHeader'
                    :dataKeyMap="clientDataMap"
                    :key="tableKey"/>

                <!-- *** MODAL *** -->
                <ModalAddGeneric
                    v-if="showModalState"
                    :labelData="columnsHeader"
                    :nameModal="nameModal"
                    :excludeFields="['N°', 'Id', 'Fecha de Creación', 'Fecha de Actualización', 'Activo']" 
                    :dataKeyMap="clientDataMap"
                    @closeModal="handleCloseModal"
                    @submitData="handleCustomerSubmit" 
                />
            </section>
        </section>
    </section>
</template>

<script setup>
import { ref, onMounted, computed } from 'vue';
import ModalAddGeneric from '@/components/ModalAddGeneric.vue';
import TableData from '@/components/TableData.vue';
import useData from '@/store/fetchData.js'; // Importa el store
// ---Store ---
const dataStore = useData(); // Instancia el store

// --- Configuración de la Tabla y Modal ---
const columnsHeader = ref(['N°', 'Id', 'Nombre', 'Apellido', 'Teléfono', 'Dirección', 'Empresa', 'Fecha de Creación', 'Fecha de Actualización', 'Activo']);
const clientEndpoint = '/clients'; // Endpoint específico para clientes
const nameModal = 'Cliente';

// --- Estado Local ---
const showModalState = ref(false);
const clients = ref([]); // Estado local para almacenar los datos de clientes

// --- Carga Inicial de Datos ---
const loadClients = async () => {
  // Llama a la acción fetchData del store, pasando el endpoint específico
    const fetchedData = await dataStore.fetchData(clientEndpoint);
    if (fetchedData) {
    // Si la acción retornó datos, actualiza el estado local
    clients.value = fetchedData;
    console.log('Clientes cargados en el componente:', clients.value);
    } else {
    // Hubo un error (ya logueado en el store), podrías mostrar un mensaje específico aquí
    console.error('Error al cargar clientes en el componente.');
    clients.value = []; // Asegura que esté vacío si falla
    }
};

onMounted(() => {
  loadClients(); // Carga los clientes cuando el componente se monta
});

const tableKey = ref(0);
const forceTableRefresh = () => {
    tableKey.value += 1;
    }

// --- Manejadores de Eventos del Modal ---
const handleShowModal = () => {
    showModalState.value = true;
};

const handleCloseModal = () => {
    showModalState.value = false;
};

// ---  Manejador de Envío (POST) ---
const handleCustomerSubmit = async (payload) => {
    if (payload.type === nameModal) {
        console.log('Componente: Intentando crear cliente con datos:', payload.data);
        // Llama a la acción createData del store, pasando endpoint y datos
        const createdClient = await dataStore.createData(clientEndpoint, payload.data); 
        if (createdClient) {
            // Éxito: La API devolvió el cliente creado (o lo que sea que devuelva tu API)
            console.log('Componente: Cliente creado exitosamente:', createdClient);
            alert(`${nameModal} agregado correctamente!`);
            // Opcional: Añadir directamente a la lista local o recargar todo
            // clients.value.push(createdClient); // Añadir si la API devuelve el objeto creado
            await loadClients(); // Recargar la lista completa desde la API
            handleCloseModal(); // Cierra el modal en éxito

            forceTableRefresh(); // Cambia la key para forzar el remontaje de TableData
        }

        else {
            // Error: La acción createData retornó null (error ya logueado en el store)
            alert(`Error al guardar ${nameModal}. Revisa la consola para más detalles.`);
        }
    }
}

// Mapeo de datos para el TableData
const clientDataMap = computed(() => ({
        'N°': null,
        'Id': 'id',
        'Nombre': 'client_name',
        'Apellido': 'client_surname',
        'Teléfono': 'phone_number',
        'Dirección': 'address',
        'Empresa': 'company_name',
        'Fecha de Creación': 'created_at',
        'Fecha de Actualización': 'updated_at',
        'Activo': 'deleted_at'
}));
</script>
