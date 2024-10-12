<template>
    <section class="w-full h-[90%] overflow-hidden pt-3 shadow-lg">
        <section class=" w-full h-full flex flex-col gap-2 items-center justify-start">
            <h3 class="text-xl">Dashboard</h3>
            <section class="w-full flex flex-wrap gap-4 justify-center items-center h-full overflow-y-scroll scroll-bar">
                <div :class="cardClass">
                    <i class='bx bxs-basket text-emerald-500 text-5xl' ></i>
                    <div :class="infoCard">
                        <h3 class="text-xl text-center">Ventas</h3>
                        <p>6</p>
                        <p>$1'500.000</p>
                    </div>
                </div>
                <div :class="cardClass">
                    <i class='bx bxs-bar-chart-alt-2 text-purple-500 text-5xl'></i>
                    <div :class="infoCard">
                        <h3 class="text-xl text-center">Cotizaciones</h3>
                        <p>13</p>
                        <p>$5'650.000</p>
                    </div>
                </div>
                <div :class="cardClass">
                    <i class='bx bxs-dollar-circle text-cyan-500 text-5xl'></i>
                    <div :class="infoCard">
                        <h3 class="text-xl text-center">Gastos</h3>
                        <p>12</p>
                        <p>$3'000.000</p>
                    </div>
                </div>
                <div :class="cardClass">
                    <i class='bx bxs-group text-rose-500 text-5xl'></i>
                    <div :class="infoCard">
                        <h3 class="text-xl text-center">Empleados</h3>
                        <p>6</p>
                        <p>$3'200.000</p>
                    </div>
                </div>
            </section>
        </section>
        

    </section>

</template>

<script setup>
const cardClass = "w-48 rounded-xl flex flex-col gap-4 justify-center items-center shadow-lg p-2"
const infoCard = "flex flex-col gap-1 justify-center items-center"
</script>
