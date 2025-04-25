<template>
    <section class="w-full h-[90%] overflow-hidden pt-3 shadow-lg">
        <section class=" w-full h-full flex flex-col gap-2 items-center justify-start">
            <h3 class="text-xl">Dashboard</h3>
            <section class="w-full flex flex-wrap gap-4 justify-center items-center h-full overflow-y-scroll scroll-bar">
                <div :class="cardClass">
                    <i className='bx bxs-badge-dollar text-7xl text-teal-300 pt-4'></i> 
                    <div :class="infoCard">
                        <p className="flex flex-col justify-center items-center text-normal font-semibold">Acumulado <span className="block font-bold text-xl">{{ salesCount }}</span></p>
                        <div className="h-[1px] bg-teal-300 w-4/5"></div>
                        <p className="flex flex-col justify-center items-center text-normal font-semibold">Total <span className="block font-bold text-xl">${{ salesAmount }}</span></p>
                        <h3 class="text-normal text-center bg-teal-300 w-full h-10 justify-self-end font-bold flex items-center justify-center">VENTAS</h3>
                    </div>
                </div>
                <div :class="cardClass">
                    <i className='bx bx-list-plus text-7xl text-violet-400 pt-4'></i> 
                    <div :class="infoCard">
                        <p className="flex flex-col justify-center items-center text-normal font-semibold">Acumulado <span className="block font-bold text-xl">{{ quotationsCount }}</span></p>
                        <div className="h-[1px] bg-violet-300 w-4/5"></div>
                        <p className="flex flex-col justify-center items-center text-normal font-semibold">Total <span className="block font-bold text-xl">${{ quotationsAmount }}</span></p>
                        <h3 class="text-normal text-center bg-violet-400 w-full h-10 justify-self-end font-bold flex items-center justify-center">COTIZACIONES</h3>
                    </div>
                </div>
                <div :class="cardClass">
                    <i className='bx bx-coin-stack text-7xl text-amber-300 pt-4'></i> 
                    <div :class="infoCard">
                        <p className="flex flex-col justify-center items-center text-normal font-semibold">Acumulado <span className="block font-bold text-xl">{{ miscellaneousCount }}</span></p>
                        <div className="h-[1px] bg-amber-300 w-4/5"></div>
                        <p className="flex flex-col justify-center items-center text-normal font-semibold">Total <span className="block font-bold text-xl">${{ miscellaneousAmount }}</span></p>
                        <h3 class="text-normal text-center bg-amber-300 w-full h-10 justify-self-end font-bold flex items-center justify-center">GASTOS EVENTUALES</h3>
                    </div>
                </div>
                <div :class="cardClass">
                    <i className='bx bx-user-check text-7xl text-sky-300 pt-4'></i> 
                    <div :class="infoCard">
                        <p className="flex flex-col justify-center items-center text-normal font-semibold">Acumulado <span className="block font-bold text-xl">{{ employeesCount }}</span></p>
                        <div className="h-[1px] bg-sky-300 w-4/5"></div>
                        <p className="flex flex-col justify-center items-center text-normal font-semibold">Total <span className="block font-bold text-xl">${{ employeesAmount }}</span></p>
                        <h3 class="text-normal text-center bg-sky-300 w-full h-10 justify-self-end font-bold flex items-center justify-center">SUELDOS</h3>
                    </div>
                </div>
                
            </section>
        </section>
        

    </section>

</template>

<script setup>
import { ref, onMounted } from 'vue';
import useData from '@/store/fetchData.js';

const cardClass = "h-64 w-48 rounded-xl flex flex-col justify-between items-center shadow-lg bg-zinc-50 overflow-hidden"
const infoCard = "flex flex-col gap-1 justify-center items-center w-full"

const dataStore = useData();
const salesEndpoint = '/sales'
const quotationsEndpoint = '/quotations'
const miscellaneousEndpoint = '/miscellaneous'
const employeesEndpoint = '/employees'


const sales = ref([]);
const salesCount = ref(0);
const salesAmount = ref(0);

const quotations = ref([]);
const quotationsCount = ref(0);
const quotationsAmount = ref(0);

const miscellaneous = ref([]);
const miscellaneousCount = ref(0);
const miscellaneousAmount = ref(0);

const employees = ref([]);
const employeesCount = ref(0);
const employeesAmount = ref(0);

const loadEndPoints = async () => {
    const fetchedSales = await dataStore.fetchData(salesEndpoint);
    const fetchedQuotations = await dataStore.fetchData(quotationsEndpoint);
    const fetchedMiscellaneous = await dataStore.fetchData(miscellaneousEndpoint);
    const fetchedEmployees = await dataStore.fetchData(employeesEndpoint);
    if (fetchedSales && fetchedQuotations && fetchedMiscellaneous && fetchedEmployees) {
        sales.value = fetchedSales;
        quotations.value = fetchedQuotations;
        miscellaneous.value = fetchedMiscellaneous;
        employees.value = fetchedEmployees;
        // console.log('Ventas cargados en el componente:', sales.value);
        // console.log('Cotizaciones cargados en el componente:', quotations.value);
        // console.log('Gastos Eventuales cargados en el componente:', miscellaneous.value);
        // console.log('Colaboradores cargados en el componente:', employees.value);
    } else {
        console.error('Error al cargar ventas en el componente.');
        sales.value = [];
        quotations.value = [];
        miscellaneous.value = [];
        employees.value = [];
    }
    
};

onMounted(async () => {
    await loadEndPoints(); 

    
    for(let i = 0; i < sales.value.length; i++) {
        salesCount.value ++
        salesAmount.value += sales.value[i].advance
    }

    for(let i = 0; i < quotations.value.length; i++) {
        quotationsCount.value ++
        quotationsAmount.value += quotations.value[i].advance_percentage
    }

    for(let i = 0; i < miscellaneous.value.length; i++) {
        miscellaneousCount.value ++
        miscellaneousAmount.value += miscellaneous.value[i].price
    }

    for(let i = 0; i < employees.value.length; i++) {
        employeesCount.value ++
        employeesAmount.value += employees.value[i].salary
    }

    // console.log(employeesCount.value)
});



</script>
