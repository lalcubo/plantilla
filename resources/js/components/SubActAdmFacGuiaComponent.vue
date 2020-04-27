<template>
    <div>
        <h3 class="text-center">Facturas de Guias Prepagada por Porcentaje</h3>
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
                                Cargar por Guia
                    </router-link>
                    </td>
                <td>
                    <router-link  class="nav-link" 
                            :to="{name: 'sub-act-adm-fac-guia'}">
                            Cargar por Archivo
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