<template>
    <div>
        <h3 class="text-center">Reporte Movimientos</h3>
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
                                M03-Listado de Pesos Guias Prepagadas
                    </router-link>
                    </td>
                <td>M04-Guias por Cliente (Miami)</td>

            </tr>
            <tr>
                <td>M07-Guias WareHouse Miami</td>
                <td>M09-Informe al Cliente</td>
            </tr>
            <tr>
                <td>M10-Listado de Tickets por Casillero</td>
                <td>M11-Pesos Globales por Casillero</td>
            </tr>
            <tr>
                <td>M12-Listado de Guias por Servicio</td>
                <td>M14-Consulta de Contactos por Casillero (Miami)</td>
            </tr>
            <tr>
                <td>M15-Guias con Devoluciones de Fisicos o POD</td>
                <td>M16-Guias en Inventario</td>
            </tr>
            <tr>
                <td>M17-Movimientos de la Guia Electronica</td>
                <td>M19-Movilización diaria de casilleros</td>
            </tr>
            <tr>
                <td>M21-Estadisticas Saliendo Miami</td>
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