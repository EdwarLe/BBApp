<template>
    <section class="w-full h-[90%] overflow-hidden pt-3 shadow-lg">
        <section class=" w-full h-full flex flex-col gap-2 items-center justify-start">
            <h3 class="text-xl">Clientes</h3>
            <div class="flex flex-row-reverse justify-between px-4 w-full">
                <button class="place-self-end mr-2 bg-indigo-800 text-white px-3 py-1 rounded-full transition-colors border border-transparent shadow-md hover:bg-slate-100 hover:text-indigo-800 hover:border-indigo-800" @click="handleShowModal">+ Nuevo Cliente</button>
                <button class="place-self-end mr-2 bg-green-800 text-white px-3 py-1 rounded-full transition-colors border border-transparent shadow-md hover:bg-slate-100 hover:text-indigo-800 hover:border-indigo-800" @click="exportToExcel">Descargar Excel</button>
            </div>
            <section class="w-full flex flex-col gap-4 justify-start items-start h-full overflow-y-scroll p-8 scroll-bar">
                <TableData :urlGetData='endpoint' :columnsHeader='columnsHeader'/>
                <ModalAdd v-if="closeModal" @closeModal="handleCloseModal" :closeModal="closeModal" :labelData="columnsHeader" :nameModal="nameModal" :fieldMapping="fieldMapping" :dataInputDB="undefined" :endpointToFetch="endpoint"/>
            </section>
        </section>
    </section>
</template>

<script setup>
import { ref } from 'vue';
import ModalAdd from '../../components/ModalAdd.vue';
import TableData from '../../components/TableData.vue';
import * as XLSX from 'xlsx'
import useData from '../../store/fetchData';

const columnsHeader = ['N°', 'Id', 'Nombre', 'Apellido', 'Teléfono', 'Dirección', 'Empresa', 'Fecha de Creación', 'Fecha de Actualización', 'Activo']
const endpoint = '/clients'

const fieldMapping = {
        "Nombre": "client_name",
        "Apellido": "client_surname",
        "Teléfono": "phone_number",
        "Dirección": "address",
        "Empresa": "company_name"
}
const nameModal = 'Cliente'

const store = useData()

const closeModal = ref(false)

const handleShowModal = () => {
    closeModal.value = true
}
const handleCloseModal = () => {
    closeModal.value = false
}

const exportToExcel = () => {
    const workSheet = XLSX.utils.json_to_sheet(store.data)
    const workBook = XLSX.utils.book_new()
    XLSX.utils.book_append_sheet(workBook,workSheet, 'Clientes')
    XLSX.writeFile(workBook, 'lista_clientes.xlsx')
}


</script>