<template>
    <section class="w-full h-[90%] overflow-hidden pt-3 shadow-lg">
        <section class=" w-full h-full flex flex-col gap-2 items-center justify-start">
            <h3 class="text-xl">Servicios</h3>
            <button class="place-self-end mr-2 bg-indigo-800 text-white px-3 py-1 rounded-full transition-colors border border-transparent shadow-md hover:bg-slate-100 hover:text-indigo-800 hover:border-indigo-800">+ Nuevo Servicio</button>
            <section class="w-full flex flex-col gap-4 justify-start items-start h-full overflow-y-scroll p-8">
                <TableData :urlGetData='endpoint' :columnsHeader='columnsHeader'/>
            </section>
        </section>
        

    </section>

</template>

<script setup>
import TableData from '../../components/TableData.vue';

const columnsHeader = ['#', 'Id', 'Nombre', 'Cantidad', 'Precio', 'Moneda', 'Usuario', 'Fecha de Creación', 'Fecha de Actualización', 'Activo']
const endpoint = '/services'

</script>
