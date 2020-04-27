<template>
    <div>
        <h3 class="text-center">Reporte Administración</h3>
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
                                A01-Detalle Venta de Taquilla por Oficina
                    </router-link>
                    </td>
                <td>A02-Total COD Entrando por Oficina</td>

            </tr>
            <tr>
                <td>A02-Total COD Entrando por Oficina(Nuevo)</td>
                <td>A03-Guias de Taquilla sin monto de facturacion</td>
            </tr>
            <tr>
                <td>A04-Guias Prepagadas sin cliente asignado</td>
                <td>A05-Guias Prepagadas Inicializadas</td>
            </tr>
            <tr>
                <td>A06-Listado de Facturas de Carga (Guias Prepagadas)</td>
                <td>A07-Soporte de Facturacion Guias Prepagadas</td>
            </tr>
            <tr>
                <td>A08-Soporte de Facturacion Guias de Aliados</td>
                <td>A09-Soporte de Facturacion de Guias Internacionales</td>
            </tr>
            <tr>
                <td>A10-Guias Internacionales sin cliente asignado</td>
                <td>A11-Consultar Facturas</td>
            </tr>
            <tr>
                <td>A12-Reporte de Ventas</td>
                <td>A13-Listado de Comision Envios de Aliados</td>
            </tr>
            <tr>
                <td>A14-Clientes de Guia Electronica</td>
                <td>A15-Clientes Activados en Guía Electrónica</td>
            </tr>
            <tr>
                <td>A16-Reporte de Guias Prepagadas por Porcentaje</td>
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