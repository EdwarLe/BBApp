<template>
    <table class="table table-fixed" :key="storeKey.keyComponent">
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
                <td :class="styleTableData">
                    <p>Editar</p>
                    <p>Eliminar</p>
                </td>
            </tr>
            
        </tbody>
    </table>
</template>

<script setup>
import { defineProps, ref, watch } from 'vue';
import useData from '../store/fetchData';
import useClassBoolean from '../store/classBoolean';

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

const storeKey = useClassBoolean()

const store = useData()
store.getDataState(props.urlGetData)


watch(() => store.data, (newVal) => {
    dataToRender.value = newVal
}, {inmediate: true})

watch(() => storeKey.keyComponent, () => {
    store.getDataState(props.urlGetData)
})

</script>