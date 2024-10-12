<template>
    <section class="w-full h-[90%] overflow-hidden pt-3 shadow-lg">
        <section class=" w-full h-full flex flex-col gap-2 items-center justify-start">
            <h3 class="text-xl">Ventas</h3>
            <div class="flex flex-row-reverse justify-between px-4 w-full">
                <button class="place-self-end mr-2 bg-indigo-800 text-white px-3 py-1 rounded-full transition-colors border border-transparent shadow-md hover:bg-slate-100 hover:text-indigo-800 hover:border-indigo-800" @click="handleShowModal">+ Nueva Venta</button>
                <button class="place-self-end mr-2 bg-green-800 text-white px-3 py-1 rounded-full transition-colors border border-transparent shadow-md hover:bg-slate-100 hover:text-indigo-800 hover:border-indigo-800" @click="exportToExcel">Descargar Excel</button>
            </div>
            <section class="w-full flex flex-col gap-4 justify-start items-start h-full overflow-y-scroll p-8 scroll-bar">
                <TableData :urlGetData='endpoint' :columnsHeader='columnsHeader'/>
                <ModalAdd v-if="closeModal" @closeModal="handleCloseModal" :closeModal="closeModal" :labelData="columnsHeader" :nameModal="nameModal" :dataInputDB="quotationsList" :fieldMapping="fieldMapping" :endpointToFetch="endpoint"/>
            </section>
        </section>
        

    </section>

</template>

<script setup>
import { onMounted, ref } from 'vue';
import TableData from '../../components/TableData.vue';
import ModalAdd from '../../components/ModalAdd.vue';
import { getData } from '../../helpers/getAuth';
import * as XLSX from 'xlsx'
import useData from '../../store/fetchData';

const columnsHeader = ['N°', 'Id', 'Fecha de Inicio', 'Fecha de Entrega', 'Avance', 'Adeuda', 'Cotización', 'Usuario', 'Fecha de Creación', 'Fecha de Actualización', 'Activo']
const endpoint = '/sales'

const fieldMapping = {
        "Fecha de Inicio": "start_date",
        "Fecha de Entrega": "end_date",
        "Avance": "advance",
        "Adeuda": "remaining_payment",
        "Cotización": "quotation_id",
        "Usuario": "user_id"
}

const nameModal = 'Ventas'

const store = useData()

const closeModal = ref(false)

const handleShowModal = () => {
    closeModal.value = true
}
const handleCloseModal = () => {
    closeModal.value = false
}

const quotationsList = ref([])

onMounted(async () => {
    const { data } = await getData('/quotations')
    quotationsList.value = data || []

})

const exportToExcel = () => {
    const workSheet = XLSX.utils.json_to_sheet(store.data)
    const workBook = XLSX.utils.book_new()
    XLSX.utils.book_append_sheet(workBook,workSheet, 'Ventas')
    XLSX.writeFile(workBook, 'lista_ventas.xlsx')
}




</script>
