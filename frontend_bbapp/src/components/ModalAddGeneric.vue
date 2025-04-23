<template>
        <section class="w-full h-full backdrop-blur-md fixed top-0 left-0 p-8 py-10 z-50 flex justify-center items-center">
            <div class="bg-neutral-100 w-full max-w-2xl max-h-[90vh] flex flex-col items-center gap-5 py-4 px-2 shadow-md overflow-y-auto scroll-bar rounded-sm mx-auto relative">
                <!-- Botón de cierre -->
                <span class="absolute top-3 right-3 bg-indigo-800 h-6 w-6 flex items-center justify-center text-white rounded-full transition-colors border border-transparent leading-tight font-bold hover:bg-transparent hover:border-indigo-800 hover:text-indigo-800 cursor-pointer" @click="handleCloseModal">X</span>
    
                <!-- Título dinámico -->
                <h2 class="text-indigo-800 font-bold text-xl text-center mt-10">Agregar {{ props.nameModal }}</h2>
    
                <!-- Formulario dinámico -->
                <form class="w-full max-w-[800px] flex flex-wrap gap-4 items-center justify-center px-4" @submit.prevent="handleSubmit">
                    <div v-for="labelName in inputsArray" :key="labelName" class="flex flex-col gap-1 w-full sm:w-auto sm:max-w-64 text-indigo-800"> 
                        <div class="flex flex-col gap-1">
                            <label :for="labelName" class="text-sm font-medium">{{ labelName }}</label> 
                            <input
                                type="text"
                                :name='labelName'
                                :id='labelName'
                                v-model="dataCapture[labelName]"
                                class="rounded-full px-3 py-1 bg-transparent border-2 border-slate-300 outline-none focus:border-indigo-500"
                            >
                        </div>
                    </div>
    
                    <!-- Botón de envío dinámico --> 
                    <div class="w-full flex justify-center mt-4">
                        <button type="submit" class="bg-indigo-800 text-white font-bold px-8 py-1 rounded-full border border-transparent transition-colors hover:border-indigo-800 hover:bg-transparent hover:text-indigo-800">
                            Agregar {{ props.nameModal }}
                        </button>
                    </div>
                </form>
            </div>
        </section>
    </template>
    
    <script setup>
        import { defineProps, defineEmits, ref, computed } from 'vue'
    
        // --- Props ---
        const props = defineProps({
            // Array con los nombres de los campos a mostrar (puede venir de la cabecera de una tabla, etc.)
            labelData: {
                type: Array,
                required: true,
                default: () => [] // Buena práctica añadir default
            },
            // Nombre del tipo de entidad que se está agregando (Cliente, Venta, etc.)
            nameModal : {
                type: String,
                required: true
            },
            // (Opcional) Campos a excluir siempre, además de los ya filtrados
            excludeFields: {
                type: Array,
                default: () => ['N°', 'Id', 'Fecha de Creación', 'Fecha de Actualización', 'Activo'] // Campos comunes a excluir
            },
            // Mapeo de datos para el form
            dataKeyMap: {
                type: Object,
                required: true,
                default: () => ({})
            }
        })
    
        // --- Emits ---
        const emit = defineEmits(['closeModal', 'submitData'])
    
        // --- State ---
        // Objeto reactivo para almacenar los datos del formulario { campo1: valor1, campo2: valor2 }
        const dataCapture = ref({})
    
        // --- Computed ---
        // Calcula los campos que realmente se mostrarán como inputs, filtrando los excluidos
        const inputsArray = computed(() => {
            if (!props.labelData) return [];
            // Crea un Set con los campos a excluir para búsqueda rápida
            const fieldsToExclude = new Set(props.excludeFields);
            return props.labelData.filter(label => !fieldsToExclude.has(label))
        })
    
        // --- Methods ---
        const handleCloseModal = () => {
            // Limpia el formulario al cerrar por si acaso
            dataCapture.value = {};
            emit('closeModal')
        }
    
        // Maneja el envío del formulario
        const handleSubmit = () => {
            console.log(`Datos a enviar para ${props.nameModal}:`, dataCapture.value);
            
            const dataTransformed = {};

            for (const dataKey in dataCapture.value) {
                const dataKeyMap = props.dataKeyMap[dataKey];
                if (dataKeyMap) {
                    dataTransformed[dataKeyMap] = dataCapture.value[dataKey];
                } else {
                    console.log('no se encontró el mapeo para el campo', dataKey);
                }
            }
    
            // 1. Emitir los datos recolectados al componente padre
            // El padre será responsable de la lógica de API, validación específica, etc.
            emit('submitData', {
                type: props.nameModal, // Opcional: enviar el tipo para que el padre sepa qué hacer
                data: dataTransformed  // Enviar una copia para evitar mutaciones inesperadas
            });
    
            // 2. Limpiar el formulario localmente
            dataCapture.value = {};
    
            // 3. Cerrar el modal (el padre podría decidir no cerrarlo si hay error)
            // Si quieres que el padre controle el cierre, comenta la siguiente línea
            // y haz que el padre llame a handleCloseModal o cambie la v-if/v-show que muestra el modal.
            emit('closeModal'); // Emitir en lugar de llamar directamente a handleCloseModal para consistencia
        }
    
    </script>
