<template>
    <section class="w-full h-[90%] overflow-hidden pt-3 shadow-lg">
        <section class=" w-full h-full flex flex-col gap-2 items-center justify-start">
            <h3 class="text-xl">Dashboard</h3>
            <section class="w-full flex flex-col gap-4 justify-start items-center h-full overflow-y-scroll">
                <div :class="cardClass">
                    <p>Icono</p>
                    <div :class="infoCard">
                        <h3 class="text-xl text-center">Ventas</h3>
                        <p>Cantidad</p>
                        <p>Monto</p>
                    </div>
                </div>
                <div :class="cardClass">
                    <p>Icono</p>
                    <div :class="infoCard">
                        <h3 class="text-xl text-center">Cotizaciones</h3>
                        <p>Cantidad</p>
                        <p>Monto</p>
                    </div>
                </div>
                <div :class="cardClass">
                    <p>Icono</p>
                    <div :class="infoCard">
                        <h3 class="text-xl text-center">Gastos</h3>
                        <p>Cantidad</p>
                        <p>Monto</p>
                    </div>
                </div>
                <div :class="cardClass">
                    <p>Icono</p>
                    <div :class="infoCard">
                        <h3 class="text-xl text-center">Pago Empleados</h3>
                        <p>Cantidad</p>
                        <p>Monto</p>
                    </div>
                </div>
            </section>
        </section>
        

    </section>

</template>

<script setup>
const cardClass = "h-32 w-48 rounded-xl flex gap-4 justify-center items-center shadow-lg p-2"
const infoCard = "flex flex-col gap-1 justify-center items-center"
</script>
