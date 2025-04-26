<template>
    <section class="w-full h-[90%] overflow-hidden pt-3 shadow-lg">
        <section class=" w-full h-full flex flex-col gap-2 items-center justify-start">
            <h3 class="text-xl font-semibold text-indigo-800 mb-2">Usuario</h3>
            <button
                class="place-self-end mr-4 mb-2 bg-indigo-800 text-white px-4 py-1.5 rounded-full transition-colors border border-transparent shadow-md hover:bg-slate-100 hover:text-indigo-800 hover:border-indigo-800 text-sm font-medium"
                @click="localShowModal"
            >
                + Nuevo Usuario
            </button>
            <section class="w-full flex flex-col gap-4 justify-start items-center h-full overflow-y-scroll p-4 md:p-8 scroll-bar">
                <p v-if="dataStore.loading" class="text-gray-500 mt-10">Cargando, por favor espere...</p>
                <p v-if="dataStore.error" class="text-red-500 mt-10">Error al cargar datos: {{ dataStore.error }}</p>
                <TableData v-else
                    :tableData="users"
                    :columnsHeader='columnsHeader'
                    :dataKeyMap="userDataMap"
                    :key="tableKey"
                    @requestEditData="localShowModal"
                    @requestDeleteData="localDeleteData"
                />

                <!-- *** MODAL *** -->
                <ModalAddGeneric
                    v-if="booleanStore.isOpen"
                    :labelData="columnsHeader"
                    :nameModal="nameModal"
                    :excludeFields="['N°', 'Id', 'Fecha de Creación', 'Fecha de Actualización', 'Activo']" 
                    :dataKeyMap="userDataMap"
                    @closeModal="localCloseModal"
                    @submitData="localHandleSubmit" 
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
import useDataModals from '@/store/dataModals';
import useClassBoolean from '@/store/classBoolean.js';
import useDataRowToEdit from '@/store/dataRowToEdit.js';
import { loadData, forceTableRefresh, postData, putData, deleteData } from '@/utils/handlers.js';

// ---Store ---
const dataStore = useData();
const dataModalStore = useDataModals();
const booleanStore = useClassBoolean();
const dataRowToEdit = useDataRowToEdit();

// --- Configuración de la Tabla y Modal ---
const columnsHeader = ref(['N°', 'Id', 'Nombre', 'Apellido', 'Correo', 'Role', 'Fecha de Creación', 'Fecha de Actualización', 'Activo'])
const userEndpoint = '/users'
const userUpdateEndpoint = '/users/update-user'
const userDeleteEndpoint = '/users/delete-user'
const nameModal = 'Usuario'


// --- Estado Local ---
const users = ref([]);
const tableKey = ref(0);

// Mapeo de datos para el TableData
const userDataMap = computed(() => ({
        'N°': null,
        'Id': 'id',
        'Nombre': 'name',
        'Apellido': 'surname',
        'Correo': 'email',
        'Role': 'role',
        'Fecha de Creación': 'created_at',
        'Fecha de Actualización': 'updated_at',
        'Activo': 'deleted_at'
}));

const localLoadUsers = async () => {
    await loadData(dataStore, userEndpoint, users)
}

const localForceRefresh = () => {
    forceTableRefresh(tableKey)
}

const localShowModal = () => {
    dataModalStore.setDataColumnHeaderModals(columnsHeader.value, nameModal, userDataMap.value)
    booleanStore.open();
}

const localCloseModal = () => {
    booleanStore.close();
    dataRowToEdit.clearDataRowToEdit();
}

// ---  Manejador de Envío (POST) ---
const localHandleSubmit = async (payload) => {
    if (dataRowToEdit.isData && payload.id) {
        putData(payload, dataStore, userUpdateEndpoint, nameModal, localLoadUsers, localCloseModal, localForceRefresh)
    }
    else {
        postData(payload, dataStore, userEndpoint, nameModal, localLoadUsers, localCloseModal, localForceRefresh)
    }
}

const localDeleteData = async (payload) => {
    if (booleanStore.isDelete) {
    deleteData(payload, dataStore, userDeleteEndpoint, nameModal, localLoadUsers, localCloseModal, localForceRefresh)
}
}

onMounted(() => {
    localLoadUsers()
});

// dataModalStore.setDataColumnHeaderModals(columnsHeader, nameModal, userDataMap.value)

</script>
