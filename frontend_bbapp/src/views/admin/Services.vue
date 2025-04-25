<template>
    <section class="w-full h-[90%] overflow-hidden pt-3 shadow-lg">
        <section class=" w-full h-full flex flex-col gap-2 items-center justify-start">
            <h3 class="text-xl font-semibold text-indigo-800 mb-2">Servicios</h3>
            <button
                class="place-self-end mr-4 mb-2 bg-indigo-800 text-white px-4 py-1.5 rounded-full transition-colors border border-transparent shadow-md hover:bg-slate-100 hover:text-indigo-800 hover:border-indigo-800 text-sm font-medium"
                @click="handleShowModal"
            >
                + Nuevo Servicio
            </button>
            <section class="w-full flex flex-col gap-4 justify-start items-center h-full overflow-y-scroll p-4 md:p-8 scroll-bar">
                <p v-if="dataStore.loading" class="text-gray-500 mt-10">Cargando, por favor espere...</p>
                <p v-if="dataStore.error" class="text-red-500 mt-10">Error al cargar datos: {{ dataStore.error }}</p>
                <TableData v-else
                    :tableData="services"
                    :columnsHeader='columnsHeader'
                    :dataKeyMap="serviceDataMap"
                    :key="tableKey"/>

                <!-- *** MODAL *** -->
                <ModalAddGeneric
                    v-if="showModalState"
                    :labelData="columnsHeader"
                    :nameModal="nameModal"
                    :excludeFields="['N°', 'Id', 'Fecha de Creación', 'Fecha de Actualización', 'Activo']" 
                    :dataKeyMap="serviceDataMap"
                    @closeModal="handleCloseModal"
                    @submitData="handleServiceSubmit" 
                />
            </section>
        </section>
    </section>
</template>

<script setup>
import { ref, onMounted, computed } from 'vue';
import ModalAddGeneric from '@/components/ModalAddGeneric.vue';
import TableData from '@/components/TableData.vue';
import useData from '@/store/fetchData.js';

// ---Store ---
const dataStore = useData();

// --- Configuración de la Tabla y Modal ---
const columnsHeader = ['N°', 'Id', 'Nombre', 'Cantidad', 'Precio', 'Moneda', 'Usuario', 'Fecha de Creación', 'Fecha de Actualización', 'Activo']
const serviceEndpoint = '/services'
const nameModal = 'Servicios'

// --- Estado Local ---
const showModalState = ref(false);
const services = ref([]);

// --- Carga Inicial de Datos ---
const loadServices = async () => {
    const fetchedData = await dataStore.fetchData(serviceEndpoint);
    if (fetchedData) {
        services.value = fetchedData;
        console.log('Servicios cargados en el componente:', services.value);
    } else {
        console.error('Error al cargar servicios en el componente.');
        services.value = [];
    }
    
};

onMounted(() => {
    loadServices(); 
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
const handleServiceSubmit = async (payload) => {
    if (payload.type === nameModal) {
        console.log('Componente: Intentando crear servicio con datos:', payload.data);
        const createdService = await dataStore.createData(serviceEndpoint, payload.data); 
        if (createdService) {
            console.log('Componente: Servicio creado exitosamente:', createdService);
            alert(`${nameModal} agregado correctamente!`);
            await loadServices(); 
            handleCloseModal(); 
            forceTableRefresh(); 
        }

        else {
            alert(`Error al guardar ${nameModal}. Revisa la consola para más detalles.`);
        }
    }
}

// Mapeo de datos para el TableData
const serviceDataMap = computed(() => ({
        'N°': null,
        'Id': 'id',
        'Nombre': 'service_name',
        'Cantidad': 'quantity',
        'Precio': 'price',
        'Moneda': 'currency',
        'Usuario': 'user_id',
        'Fecha de Creación': 'created_at',
        'Fecha de Actualización': 'updated_at',
        'Activo': 'deleted_at'
}));

</script>
