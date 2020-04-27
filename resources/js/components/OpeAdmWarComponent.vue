<template>
    <div>
        <h3 class="text-center">Administración del Warehouse</h3>
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
                                Envíos Desconocidos
                    </router-link>
                    </td>
                <td>Envíos Retenidos</td>
            </tr>
            <tr>
                <td>Retiros por Oficina</td>
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