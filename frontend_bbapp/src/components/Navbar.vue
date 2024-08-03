<template>
    <section class="bg-neutral-100 w-full rounded-t-2xl overflow-hidden border-b border-slate-300">
        <header class="h-24 w-full flex justify-around items-center p-2">
            <div class="h-4/5">
                <img src="../../public/imgs/logo-mana.jpeg" alt="Company logo" class="h-full">
            </div>
            <div class="flex h-full justify-center items-center gap-2">
                <div class="h-4/5 aspect-square rounded-full overflow-hidden">
                    <img src="../../public/imgs/user-img.png" alt="Profile picture" class="object-cover h-full">
                </div>
                <div class="flex flex-col justify-center items-center">
                    <p class="font-bold">{{ `${userNameLoged} ${userSurnameLoged}` }}</p>
                    <small>{{ roleInPage }}</small>
                </div>
            </div>
        </header>
    </section>
</template>

<script setup>
import useAuth from '../store/auth';

const store = useAuth()
const userNameLoged = store.userData.name
const userSurnameLoged = store.userData.surname
const userRoleLoged = store.userData.role

const roleInPage = userRoleLoged === 0 ? 'superAdmin' : userRoleLoged === 1 ? 'Adminnistrador' : 'Vendedor'

</script>