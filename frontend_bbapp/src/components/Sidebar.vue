<template>
    <section id="menu-links" class="bg-indigo-800 h-full flex flex-col justify-center items-center gap-3 text-white fixed top-0 transition-all lg:left-0 lg:w-[200px] z-10" :class="showMenu" >

        <div :onclick="collapseMenu" ><i class='bx bx-arrow-back absolute top-28 bg-lime-600 px-1 pl-2 py-1 rounded-l-full cursor-pointer transition-all' :class="rotateArrow"></i></div>

        <router-link to='dashboard' :onclick="collapseMenu" class="hover:bg-cyan-500 py-1 px-8 rounded-full transition-colors">Dashboard</router-link>
        <router-link to='customers' :onclick="collapseMenu" class="hover:bg-cyan-500 py-1 px-8 rounded-full transition-colors">Clientes</router-link>
        <router-link to='quotations' :onclick="collapseMenu" class="hover:bg-cyan-500 py-1 px-8 rounded-full transition-colors">Cotizaciones</router-link>
        <router-link to='sales' :onclick="collapseMenu" class="hover:bg-cyan-500 py-1 px-8 rounded-full transition-colors">Ventas</router-link>
        <router-link to='miscellaneous' :onclick="collapseMenu" class="hover:bg-cyan-500 py-1 px-8 rounded-full transition-colors">Gastos Eventuales</router-link>
        <router-link to='supplies' :onclick="collapseMenu" class="hover:bg-cyan-500 py-1 px-8 rounded-full transition-colors">Suministros</router-link>
        <router-link to='services' :onclick="collapseMenu" class="hover:bg-cyan-500 py-1 px-8 rounded-full transition-colors">Servicios</router-link>
        <router-link to='employees' :onclick="collapseMenu" class="hover:bg-cyan-500 py-1 px-8 rounded-full transition-colors">Colaboradores</router-link>
        <router-link to='users' :onclick="collapseMenu" class="hover:bg-cyan-500 py-1 px-8 rounded-full transition-colors">Usuarios</router-link>

        <button class="bg-lime-600 px-4 py-2 rounded-full mt-10 border-2 border-transparent transition hover:bg-transparent hover:border-lime-600" v-on:click="handleLogout()">Cerrar Sesión</button>

    </section>
</template>

<script setup>
import { ref } from 'vue'
import useClassBoolean from '../store/classBoolean';
import { getData } from '../helpers/getAuth';
import useAuth from '../store/auth';
import router from '../router/routes';

const store = useClassBoolean()
const storeLogin = useAuth()
const showMenu = ref('-left-full w-full')
const rotateArrow = ref('rotate-180 -right-[28px] lg:hidden')

const collapseMenu = () => {
    store.changeBoolean()

    if(store.isActive) {
        showMenu.value = 'left-0 sm:w-[200px]'
        rotateArrow.value = 'rotate-0 right-0 lg:hidden'
    }
    if(!store.isActive) {
        rotateArrow.value = 'rotate-180 -right-[28px] lg:hidden'
        showMenu.value = '-left-full w-full'
    }
}

const handleLogout = () => {
    storeLogin.token = null
    router.push('/')
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