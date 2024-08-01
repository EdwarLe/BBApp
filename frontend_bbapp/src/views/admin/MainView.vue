<template>
    <section class="w-full place-self-start py-7 h-full">
        <Navbar />
        <Sidebar />
        <div class="bg-slate-100 w-full max-h-[85%] h-[85%] p-3 overflow-hidden">
            <h2 class="text-lg pb-3" :class="displayNone">Bienvenido {{ nameUserLoged }}!</h2>
            <router-view></router-view>
        </div>

    </section>
</template>

<script setup>
import Navbar from '../../components/Navbar.vue';
import Sidebar from '../../components/Sidebar.vue'
import useAuth from '../../store/auth';

const store = useAuth()

const nameUserLoged = store.userData.userName
let displayNone = ''
setTimeout(() => {
    displayNone = 'hidden'
}, 300000);
</script>