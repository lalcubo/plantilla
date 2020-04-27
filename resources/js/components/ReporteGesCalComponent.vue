<template>
    <div>
        <h3 class="text-center">Reporte Gestión de Calidad</h3>
        <table class="table table-striped table-hover text-sm table-bordered">
            <thead>
                <tr>
                    <th ></th>
                    <th></th>
                </tr>
            </thead>
        <tbody>
            <tr>
                <td>
                    <router-link  class="nav-link" 
                                :to="{name: '#'}">
                                C01-Detalle de Guias no Entregadas (Pendientes)
                    </router-link>
                    </td>
                <td>C02-Detalle de Guias de Masivos no Entregadas (Pendientes)</td>
            </tr>
            <tr>
                <td>C04-Detalle de guias con RT</td>
                <td>C05-Consulta de Guías con Gestión</td>
            </tr>
            <tr>
                <td>C06-Efectividad por Oficina</td>
                <td></td>
            </tr>
        </tbody>
        </table>
    </div>
</template>
<<script>
export default {

}
</script>