<template>
    <div>
        <h3 class="text-center">Reporte Operaciones</h3>
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
                                O06-Control de Mercancia (Seguridad)
                    </router-link>
                    </td>
                <td>O10-Piezas y Kgs movilizados Origen - Destino</td>
            </tr>
            <tr>
                <td>Reporte de Actividad Inventario</td>
                <td>Reporte de Movilización de Casillero Internacional</td>
            </tr>
            <tr>
                <td>Importación Archivo de Cliente</td>
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