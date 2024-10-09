<template>
    <section class="w-full place-self-start py-7 h-full">
        <Navbar />
        <Sidebar />
        <div class="bg-slate-100 max-h-[85%] h-[85%] p-3 overflow-hidden sm:px-10 lg:ml-[200px] relative">
            <h2 class="text-lg pb-3" :class="displayNone">Bienvenid@ {{ nameUserLoged }}!</h2>
            <router-view></router-view>
        </div>

    </section>
</template>

<script setup>
import { ref } from 'vue';
import Navbar from '../../components/Navbar.vue';
import Sidebar from '../../components/Sidebar.vue'
import useAuth from '../../store/auth';

const store = useAuth()

const nameUserLoged = store.userData.name

let displayNone = ref('')

setTimeout(() => {
    displayNone.value = 'hidden'
}, 120000);
</script>