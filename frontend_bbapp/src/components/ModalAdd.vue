<template>
    <section class="w-full h-full backdrop-blur-md absolute top-0 left-0 p-8 py-10">
        <div class="bg-neutral-100 w-full h-full flex flex-col justify-center items-center gap-5 py-4 px-2 shadow-md overflow-y-scroll scroll-bar rounded-sm mx-auto cursor-pointer md:w-4/5">
            <span class="absolute top-3 right-3 bg-indigo-800 h-6 aspect-square text-center text-white rounded-full transition-colors border border-transparent leading-tight font-bold hover:bg-transparent hover:border-indigo-800 hover:text-indigo-800" @click="handleCloseModal">X</span>
            <h2 class="text-indigo-800 font-bold text-xl text-center mt-10">Agregar {{ props.nameModal }}</h2>
            <form class="max-w-[800px] flex flex-wrap gap-2 items-center justify-center md:gap-4" @submit.prevent.default="handleSubmit">
                <div v-for="labelName in inputsArray" :key="labelName" class="flex flex-col gap-1 max-w-64 text-indigo-800">
                    <div class="flex flex-col gap-1">
                        <label :for="labelName">{{ labelName }}</label>
                        <input v-if="['Teléfono', 'Cantidad', 'Precio', 'Avance', 'Adeuda'].includes(labelName)" type="number" :name='labelName' :id='labelName' v-model=dataCapture[labelName] class="rounded-full px-3 bg-transparent border-2 border-slate-300 outline-none">
                        <select v-else-if="labelName === '¿Es venta?'" :name='labelName' :id='labelName' v-model=dataCapture[labelName] class="rounded-full px-3 bg-transparent border-2 border-slate-300 outline-none">
                            <option value="">Seleccionar</option>
                            <option value="1">Si</option>
                            <option value="0">No</option>
                            </select>
                        <textarea v-else-if="labelName === 'Descripción'" :name='labelName' :id='labelName' v-model=dataCapture[labelName] class="rounded-full px-3 bg-transparent border-2 border-slate-300 outline-none resize-none" rows="1">
                        </textarea>
                        <select v-else-if="labelName === 'Cliente'" :name='labelName' :id='labelName' v-model=dataCapture[labelName] class="rounded-full px-3 bg-transparent border-2 border-slate-300 outline-none">
                                <option value="">Seleccionar</option>
                                <option v-for="dataPropsClient in props.dataInputDB" :value="dataPropsClient.id">{{ `${dataPropsClient.client_name} ${dataPropsClient.client_surname}` }}</option>
                        </select>
                        <select v-else-if="labelName === 'Cotización'" :name='labelName' :id='labelName' v-model=dataCapture[labelName] class="rounded-full px-3 bg-transparent border-2 border-slate-300 outline-none">
                                <!-- <option value="all">Seleccionar</option> -->
                                <option v-for="dataPropsQuotations in props.dataInputDB" :value="dataPropsQuotations.id">{{ `${dataPropsQuotations.id}` }}</option>
                        </select>
                        
                        <input v-else="" type="text" :name='labelName' :id='labelName' v-model=dataCapture[labelName] class="rounded-full px-3 bg-transparent border-2 border-slate-300 outline-none">

                    </div>

                </div>
                
                <div class="w-full flex justify-center mt-4">
                    <button type="submit" class="bg-indigo-800 text-white font-bold px-8 py-1 rounded-full border border-transparent transition-colors hover:border-indigo-800 hover:bg-transparent hover:text-indigo-800 opa">Agregar</button>
                </div>
            </form>
        </div>
    </section>
</template>
<script setup>
    import { defineProps, defineEmits, computed, ref, onUpdated } from 'vue'
    import useData from '../store/fetchData';
    import useClassBoolean from '../store/classBoolean';

    const store = useData()
    const storeKey = useClassBoolean()

    const props = defineProps({
        labelData: Array,
        nameModal: String,
        fieldMapping: Object,
        dataInputDB: Array,
        endpointToFetch: String
    })

    const emit = defineEmits(['closeModal'])

    let inputsArray = ref('');
    const dataCapture = ref({})
    
    inputsArray.value = props.labelData.filter(ele => {
        return ele !== 'N°' && ele !== 'Id' && ele !== 'Fecha de Creación' && ele !== 'Fecha de Actualización' && ele !== 'Activo'
    })
    
    const handleCloseModal = () => {
        emit('closeModal')
    }

    const handleSubmit = async () => {
        const dataToLower = {}

        for(const key in dataCapture.value) {
            const newKey = props.fieldMapping[key]
            dataToLower[newKey] = dataCapture.value[key]
        }
        await store.postDataState(props.endpointToFetch, dataToLower)

        inputsArray.value.forEach(labelName => {
        dataCapture.value[labelName] = ''
        storeKey.changeKeyComponent()
    })
    }
</script>
<style scoped>

</style>