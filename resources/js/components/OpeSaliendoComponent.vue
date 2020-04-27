<template>
    <div>
        <h3 class="text-center">Saliendo</h3>
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
                                Importación Archivo de Cliente
                    </router-link>
                    </td>
                <td>Cuadre de Guías en archivo</td>
            </tr>
            </tbody>
        </table>
    </div>
</template>
<<script>
export default {

}
</script>