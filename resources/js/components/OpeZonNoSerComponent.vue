<template>
    <div>
        <h3 class="text-center">Zonas No Servidas</h3>
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
                        Ingresar
                    </router-link>
                    </td>
                <td>
                    <router-link  class="nav-link" 
                        :to="{name: '#'}">
                        Consultar/Modificar
                    </router-link>
                    </td>
            </tr>
            <tr>
                <td>
                    <router-link  class="nav-link" 
                        :to="{name: '#'}">
                        Eliminar
                    </router-link>
                </td>
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