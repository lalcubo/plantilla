<template>
    <div>
        <h3 class="text-center">Notificaciones de Pagos</h3>
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
                                Verificación de Pagos por Transferencia
                    </router-link>
                    </td>
                <td>Consulta de Transferencias Verificadas</td>
            </tr>
            <tr>
                <td>Consulta de Notificaciones de Pagos via Transferencia</td>
                <td>Verificación de Pago Móvil</td>
            </tr>
            </tbody>
        </table>
    </div>
</template>
<<script>
export default {

}
</script>