<template>
    <table class="table table-fixed">
        <thead class=" bg-slate-200 p-8">
            <tr class="divide-x-[1px] divide-slate-300 ">
                <th :class="styleTableHead" v-for="header in props.columnsHeader">{{ header }}</th>
                <th :class="styleTableHead">Opciones</th>
            </tr>
        </thead>
        <tbody class="divide-y-[1px] divide-slate-300">
            <tr v-for="dataGeneral, i in dataToRender" :key="dataGeneral.id">
                <td :class="styleTableData">{{ i + 1 }}</td>
                <td :class="styleTableData" v-for="data in dataGeneral">{{ data }}</td>
                <!-- <td :class="styleTableData">{{ client.client_name }}</td>
                <td :class="styleTableData">{{ client.client_surname }}</td>
                <td :class="styleTableData">{{ client.company_name }}</td>
                <td :class="styleTableData">{{ client.address }}</td>
                <td :class="styleTableData">{{ client.phone_number }}</td>
                <td :class="styleTableData">{{ client.created_at }}</td>
                <td :class="styleTableData">{{ client.updated_at }}</td>
                <td :class="styleTableData">{{ client.deleted_at }}</td> -->
                <td :class="styleTableData">
                    <p>Editar</p>
                    <p>Eliminar</p>
                </td>
            </tr>
            
        </tbody>
    </table>
</template>

<script setup>
import { defineProps, ref } from 'vue';
import useClientsData from '../store/clientsData';

const styleTableHead = 'text-center px-2 font-bold'
const styleTableData = 'p-2 max-h-20'
let dataToRender = ref([])

const props = defineProps({
    urlGetData: {
        type: String,
    required: true
    },
    columnsHeader: Array
    
})

const store = useClientsData()
store.setArrayClients(props.urlGetData)

setTimeout(() => {
    dataToRender.value = store.clients
    
}, 500);




</script>