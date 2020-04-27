<template>
    <div>
        <h3 class="text-center">Actualización Administrativa</h3>
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
                                Venta de Contado
                    </router-link>
                    </td>
                <td>
                    <router-link  class="nav-link" 
                            :to="{name: 'sub-act-adm-fac-guia'}">
                            Facturas de Guias Prepagada por Porcentaje
                    </router-link>
                </td>
            </tr>
            <tr>
                <td>
                    <router-link  class="nav-link" 
                                :to="{name: '#'}">
                                Actualizar Seguro y Traslado (Prepagadas y Casilleros)
                    </router-link>
                    </td>
                <td>
                    <router-link  class="nav-link" 
                            :to="{name: '#'}">
                            Envio de Aliado
                    </router-link>
                </td>
            </tr>
            <tr>
                <td>
                    <router-link  class="nav-link" 
                                :to="{name: '#'}">
                                Crear Solicitud de Nota de Débito / Crédito (Nuevo)
                    </router-link>
                    </td>
                <td>
                    <router-link  class="nav-link" 
                            :to="{name: '#'}">
                            Crear Solicitud de Nota de Débito / Crédito COD (Nuevo)
                    </router-link>
                </td>
            </tr>
            <tr>
                <td>
                    <router-link  class="nav-link" 
                                :to="{name: '#'}">
                                Ver Solicitudes de Nota de Débito / Crédito (Nuevo)
                    </router-link>
                    </td>
                <td>
                    <router-link  class="nav-link" 
                            :to="{name: '#'}">
                    </router-link>
                </td>
            </tr>
        </tbody>
        </table>
    </div>
</template>
<<script>
export default {

}
</script>