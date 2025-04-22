<template>
    <section class="w-full h-[90%] overflow-hidden pt-3 shadow-lg">
        <section class=" w-full h-full flex flex-col gap-2 items-center justify-start">
            <h3 class="text-xl">Clientes</h3>
            <button class="place-self-end mr-2 bg-indigo-800 text-white px-3 py-1 rounded-full transition-colors border border-transparent shadow-md hover:bg-slate-100 hover:text-indigo-800 hover:border-indigo-800" @click="handleShowModal">+ Nuevo Cliente</button>
            <section class="w-full flex flex-col gap-4 justify-start items-start h-full overflow-y-scroll p-8 scroll-bar">
                <p v-if="!isData">Cargando, por favor espere...</p>
                <TableData v-else :urlGetData='endpoint' :columnsHeader='columnsHeader'/>
                <ModalAddGeneric v-if="closeModal" @closeModal="handleCloseModal" :closeModal="closeModal" :labelData="columnsHeader" :nameModal="nameModal"/>
            </section>
        </section>
    </section>
</template>

<script setup>
import { ref } from 'vue';
import ModalAddGeneric from '../../components/ModalAddGeneric.vue';
import TableData from '../../components/TableData.vue';

const columnsHeader = ['N°', 'Id', 'Nombre', 'Apellido', 'Teléfono', 'Dirección', 'Empresa', 'Fecha de Creación', 'Fecha de Actualización', 'Activo']
const endpoint = '/clients'

const isData = ref(false)
setTimeout(() => {
    isData.value = true
}, 500);

const nameModal = 'Cliente'

const closeModal = ref(false)

const handleShowModal = () => {
    closeModal.value = true
}
const handleCloseModal = () => {
    closeModal.value = false
}

</script>