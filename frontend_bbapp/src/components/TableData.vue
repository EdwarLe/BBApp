<template>
    <table class="table table-fixed w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <!-- Cabeceras -->
                <th scope="col" :class="styleTableHead" v-for="header in props.columnsHeader" :key="header">
                    {{ header }}
                </th>
                <!-- Opciones -->
                <th scope="col" :class="styleTableHead">
                    Opciones
                </th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
            <!-- Filas de Datos -->
            <tr v-for="(dataRow, rowIndex) in props.tableData" :key="dataRow.id || rowIndex" class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">

                <!-- Celdas de Datos (Iterando sobre Cabeceras) -->
                <td v-for="header in props.columnsHeader" :key="header + rowIndex" :class="styleTableData">
                    <!-- Usar la función auxiliar para obtener el valor correcto -->
                    <span>{{ getCellValue(dataRow, header, rowIndex) }}</span>
                </td>

                <!-- Celda de Opciones -->
                <td :class="styleTableData" class="px-6 py-4 text-right space-x-2">
                    <button class="font-medium text-blue-600 dark:text-blue-500 hover:underline" 
                    @click="handleEditar(dataRow)">Editar</button>
                    <button class="font-medium text-red-600 dark:text-red-500 hover:underline" 
                    @click="handleDelete(dataRow)">Eliminar</button>
                </td>
            </tr>
            <!-- Mensaje si no hay datos -->
            <tr v-if="!props.tableData || props.tableData.length === 0">
                <td :colspan="props.columnsHeader.length + 1" class="text-center py-4 text-gray-500">
                    No hay datos para mostrar.
                </td>
            </tr>
        </tbody>
    </table>

</template>

<script setup>
import { defineProps, defineEmits } from 'vue';
import useDataRowToEdit from '@/store/dataRowToEdit.js';
import useClassBoolean from '@/store/classBoolean.js';

const dataRowToEdit = useDataRowToEdit();
const deleteData = useClassBoolean();

const styleTableHead = 'px-6 py-3 text-center font-bold';
const styleTableData = 'px-6 py-4';

const emit = defineEmits(['requestEditData', 'requestDeleteData']);

const props = defineProps({
    tableData: {
        type: Array,
        required: true,
        default: () => []
    },
    columnsHeader: {
        type: Array,
        required: true,
        default: () => []
    },
    dataKeyMap: {
        type: Object,
        required: true,
        default: () => ({})
    }
});

// --- Función Auxiliar para Obtener y Formatear el Valor de la Celda ---
const getCellValue = (row, header, rowIndex) => {
    // Caso especial para 'N°'
    if (header === 'N°') {
        return rowIndex + 1;
    }

    // Obtiene la clave real del objeto de datos usando el mapeo PROPORCIONADO
    const dataKey = props.dataKeyMap[header];

    // Si no hay mapeo DEFINIDO POR EL PADRE para esta cabecera, muestra un aviso
    // (Excepto para 'Activo', que manejaremos específicamente aunque esté mapeado)
    if (dataKey === undefined && header !== 'Activo') { // Modificado para no advertir por 'Activo' si no estuviera mapeado
        console.warn(`TableData: No data key map provided for header: "${header}".`);
        return '?';
    }

    // Obtiene el valor del objeto usando la clave mapeada (o directamente si es 'Activo' y no mapeado)
    // Para 'Activo', necesitamos la clave 'deleted_at' que SÍ está mapeada
    const value = row[dataKey]; // dataKey será 'deleted_at' cuando header sea 'Activo'

    // 
    if (header === 'Activo') {
        // Si el valor de 'deleted_at' es null o undefined, está activo
        return (value === null || value === undefined) ? 'Activo' : 'Inactivo';
    }


    // Si el valor no existe en el objeto para esa clave (y no es 'Activo'), devuelve '-'
    if (value === undefined || value === null) {
        return '-';
    }

    // --- Formateo Opcional para Fechas (excluyendo 'deleted_at' que ya manejamos) ---
    if (typeof value === 'string' && dataKey !== 'deleted_at' && (dataKey.includes('_at') || dataKey.includes('date'))) {
        try {
            return new Date(value).toLocaleDateString(undefined, {
                year: 'numeric', month: 'short', day: 'numeric'
            });
        } catch (e) {
            return value; // Devuelve el valor original si no se puede formatear
        }
    }

    // Devuelve el valor sin formato para otras columnas
    return value;
}

const handleEditar = (row) => {
    dataRowToEdit.setDataRowToEdit(row);
    dataRowToEdit.isData = true;
    // handleShowModal();
    emit('requestEditData', row);
    console.log(dataRowToEdit.dataRowToEdit)
};

const handleDelete = (row) => {
    console.log('Componente: Intentando eliminar usuario con id:', row.id);
    deleteData.delete()
    emit('requestDeleteData', row);
}


</script>
