<template>
    <section id="menu-links" class="w-full bg-indigo-800 h-full flex flex-col justify-center items-center gap-5 text-white fixed top-0 transition-all" :class="showMenu" >

        <div :onclick="collapseMenu"><i class='bx bx-arrow-back absolute top-28 bg-lime-600 px-1 pl-2 py-1 rounded-l-full cursor-pointer transition-all' :class="rotateArrow"></i></div>

        <router-link to='dashboard' :onclick="collapseMenu">Dashboard</router-link>
        <router-link to='customers' :onclick="collapseMenu">Clientes</router-link>
        <router-link to='quotations' :onclick="collapseMenu">Cotizaciones</router-link>
        <router-link to='sales' :onclick="collapseMenu">Ventas</router-link>
        <router-link to='miscellaneous' :onclick="collapseMenu">Gastos Eventuales</router-link>
        <router-link to='supplies' :onclick="collapseMenu">Suministros</router-link>
        <router-link to='services' :onclick="collapseMenu">Servicios</router-link>
        <router-link to='employees' :onclick="collapseMenu">Colaboradores</router-link>
        <router-link to='users' :onclick="collapseMenu">Usuarios</router-link>

    </section>
</template>

<script setup>
import { ref } from 'vue'
import useClassBoolean from '../store/classBoolean';

const store = useClassBoolean()
const showMenu = ref('-left-full')
const rotateArrow = ref('rotate-180 -right-[28px]')

const collapseMenu = () => {
    store.changeBoolean()

    if(store.isActive) {
        showMenu.value = 'left-0'
        rotateArrow.value = 'rotate-0 right-0'
    }
    if(!store.isActive) {
        rotateArrow.value = 'rotate-180 -right-[28px]'
        showMenu.value = '-left-full'
    }
}


</script>

<style scoped>
#menu-links a.router-link-exact-active {
    background-color: white;
    padding: 4px 32px;
    border-radius: 30px;
    color: #3730a3;
}
</style>