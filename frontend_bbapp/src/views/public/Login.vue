<template>
    <section class="bg-white w-full max-w-[800px] h-[500px] rounded-lg shadow-xl overflow-hidden mx-auto flex flex-col justify-between items-center sm:flex-row">
      <div class="w-full h-1/3 sm:w-1/2 sm:h-full">
        <img src="../../../public/imgs/chart-img.webp" alt="chart image" class="object-cover h-full w-full">
      </div>
      <div class="p-4 mx-auto">
        <div class="mb-8">
          Logo
        </div>
        <h4 class="text-sky-700 font-bold text-lg text-center">
          Ingresa a tu Panel Administrativo
        </h4>
        <form v-on:submit.prevent="login" class="flex flex-col gap-4 mb-8">
          <div class="flex flex-col">
            <label for="email" class="top-1 left-4 text-blue-900">Correo</label>
            <input type="text" name="email" id="email" v-model="userLogin.email" class="outline-none border border-blue-900 rounded-md p-2 text-blue-900 placeholder-blue-900-50 text-sm focus:outline-none focus:border-blue-600 focus:ring-1 focus:ring-blue-500 transition-all" placeholder="example@example.com">
          </div>
          <div class="flex flex-col">
            <label for="password" class="top-1 left-4 text-blue-900">Contraseña</label>
            <input type="text" name="password" id="password" v-model="userLogin.password" class="outline-none border border-blue-900 rounded-md p-2 text-blue-900 placeholder-blue-900-50 text-sm focus:outline-none focus:border-blue-600 focus:ring-1 focus:ring-blue-500 transition-all" placeholder="********">
          </div>
          <button type="submit" class="bg-blue-900 text-white p-1 rounded-md border border-white hover:bg-white hover:text-blue-900 hover:border hover:border-blue-900 transition-colors">Ingresar</button>
        </form>
      </div>
    </section>

</template>

<script setup>
import axios from 'axios';
import { ref } from 'vue';
import { postAuth } from '../../helpers/getAuth';

const userLogin = ref({email: '', password: ''})

const login = () => {
  // postAuth('/login', userLogin.value)
  // console.log(userLogin.value.email)
  const getUsers = async () => {
    const response = await axios.get('http://localhost:8000/api/v1/users')
    console.log(response)

  }
  getUsers()
}
</script>

  
