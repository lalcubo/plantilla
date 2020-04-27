<template>
    <div>
        <h3 class="text-center">Reporte Werehouse</h3>
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
                                Registros de Acceso
                    </router-link>
                </td>
                <td>Reporte de Actividad Aprobaciones</td>
            </tr>
            <tr>
                <td>Reporte de Actividad Facturas</td>
                <td>Reporte de Actividad Desconocidos</td>
            </tr>
            <tr>
                <td>Reporte de Actividad de Overgood</td>
                <td>Reporte de Actividad Retiros por Oficina</td>
            </tr>
            <tr>
                <td>Reporte de Actividad de Envíos de Casilleros Reactivados</td>
                <td>Reporte de Envíos con Pagos Verificados (NUEVO)</td>
            </tr>
            <tr>
                <td>Reporte de Actividad</td>
                <td>Registros de Acceso</td>
            </tr>
        </tbody>
        </table>
    </div>
</template>
<<script>
export default {

}
</script>