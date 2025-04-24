<template>
    <section class="w-full h-[90%] overflow-hidden pt-3 shadow-lg">
        <section class=" w-full h-full flex flex-col gap-2 items-center justify-start">
            <h3 class="text-xl font-semibold text-indigo-800 mb-2">Colaboradores</h3>
            <button
                class="place-self-end mr-4 mb-2 bg-indigo-800 text-white px-4 py-1.5 rounded-full transition-colors border border-transparent shadow-md hover:bg-slate-100 hover:text-indigo-800 hover:border-indigo-800 text-sm font-medium"
                @click="handleShowModal"
            >
                + Nuevo Colaborador
            </button>
            <section class="w-full flex flex-col gap-4 justify-start items-center h-full overflow-y-scroll p-4 md:p-8 scroll-bar">
                <p v-if="dataStore.loading" class="text-gray-500 mt-10">Cargando, por favor espere...</p>
                <p v-if="dataStore.error" class="text-red-500 mt-10">Error al cargar datos: {{ dataStore.error }}</p>
                <TableData v-else
                    :tableData="employees"
                    :columnsHeader='columnsHeader'
                    :dataKeyMap="employeeDataMap"
                    :key="tableKey"/>

                <!-- *** MODAL *** -->
                <ModalAddGeneric
                    v-if="showModalState"
                    :labelData="columnsHeader"
                    :nameModal="nameModal"
                    :excludeFields="['N°', 'Id', 'Fecha de Creación', 'Fecha de Actualización', 'Activo']" 
                    :dataKeyMap="employeeDataMap"
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
import useData from '@/store/fetchData.js';

// ---Store ---
const dataStore = useData();

// --- Configuración de la Tabla y Modal ---

const columnsHeader = ref(['N°', 'Id', 'Cargo', 'Nombre', 'Apellido', 'Tipo de Documento', 'Número Documento', 'Salario Diario', 'Fecha de Creación', 'Fecha de Actualización', 'Activo'])
const employeeEndpoint = '/employees'
const nameModal = 'Colaborador'

// --- Estado Local ---
const showModalState = ref(false);
const employees = ref([]);

// --- Carga Inicial de Datos ---
const loadEmployees = async () => {
    // Llama a la acción fetchData del store, pasando el endpoint específico
    const fetchedData = await dataStore.fetchData(employeeEndpoint);
    if (fetchedData) {
        // Si la acción retornó datos, actualiza el estado local
        employees.value = fetchedData;
        console.log('Colaboradores cargados en el componente:', employees.value);
    } else {
        // Hubo un error (ya logueado en el store), podrías mostrar un mensaje específico aquí
        console.error('Error al cargar colaboradores en el componente.');
        employees.value = []; // Asegura que esté vacío si falla
    }
};

onMounted(() => {
    loadEmployees(); // Carga los clientes cuando el componente se monta
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
        console.log('Componente: Intentando crear colaborador con datos:', payload.data);
        // Llama a la acción createData del store, pasando endpoint y datos
        const createdEmployee = await dataStore.createData(employeeEndpoint, payload.data); 
        if (createdEmployee) {
            // Éxito: La API devolvió el cliente creado (o lo que sea que devuelva tu API)
            console.log('Componente: Colaborador creado exitosamente:', createdEmployee);
            alert(`${nameModal} agregado correctamente!`);
            // Opcional: Añadir directamente a la lista local o recargar todo
            // clients.value.push(createdClient); // Añadir si la API devuelve el objeto creado
            await loadEmployees(); // Recargar la lista completa desde la API
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
const employeeDataMap = computed(() => ({
        'N°': null,
        'Id': 'id',
        'Cargo': 'job',
        'Nombre': 'first_name',
        'Apellido': 'surname',
        'Tipo de Documento': 'id_type',
        'Número Documento': 'id_number',
        'Salario Diario': 'salary',
        'Fecha de Creación': 'created_at',
        'Fecha de Actualización': 'updated_at',
        'Activo': 'deleted_at'
}));
</script>
