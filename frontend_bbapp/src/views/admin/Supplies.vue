<template>
    <section class="w-full h-[90%] overflow-hidden pt-3 shadow-lg">
        <section class=" w-full h-full flex flex-col gap-2 items-center justify-start">
            <h3 class="text-xl">Suministros</h3>
            <div class="flex flex-row-reverse justify-between px-4 w-full">
                <button class="place-self-end mr-2 bg-indigo-800 text-white px-3 py-1 rounded-full transition-colors border border-transparent shadow-md hover:bg-slate-100 hover:text-indigo-800 hover:border-indigo-800" @click="handleShowModal">+ Nuevo Suministro</button>
                <button class="place-self-end mr-2 bg-green-800 text-white px-3 py-1 rounded-full transition-colors border border-transparent shadow-md hover:bg-slate-100 hover:text-indigo-800 hover:border-indigo-800" @click="exportToExcel">Descargar Excel</button>
            </div>
            <section class="w-full flex flex-col gap-4 justify-start items-start h-full overflow-y-scroll p-8 scroll-bar">
                <TableData :urlGetData='endpoint' :columnsHeader='columnsHeader'/>
                <ModalAdd v-if="closeModal" @closeModal="handleCloseModal" :closeModal="closeModal" :labelData="columnsHeader" :nameModal="nameModal" :dataInputDB="userList" :fieldMapping="fieldMapping" :endpointToFetch="endpoint"/>
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

const columnsHeader = ['N°', 'Id', 'Nombre', 'Cantidad', 'Precio', 'Unidad de Medida', 'Usuario', 'Fecha de Creación', 'Fecha de Actualización', 'Activo']
const endpoint = '/supplies'

const fieldMapping = {
        "Nombre": "supply_name",
        "Cantidad": "quantity",
        "Precio": "price",
        "Unidad de Medida": "change_measurement",
        "Usuario": "user_id"
}

const nameModal = 'Suministros'

const store = useData()

const closeModal = ref(false)

const handleShowModal = () => {
    closeModal.value = true
}
const handleCloseModal = () => {
    closeModal.value = false
}

const userList = ref([])

onMounted(async () => {
    const { data } = await getData('/users')
    userList.value = data || []

})

const exportToExcel = () => {
    const workSheet = XLSX.utils.json_to_sheet(store.data)
    const workBook = XLSX.utils.book_new()
    XLSX.utils.book_append_sheet(workBook,workSheet, 'Suministros')
    XLSX.writeFile(workBook, 'lista_suministros.xlsx')
}


</script>
