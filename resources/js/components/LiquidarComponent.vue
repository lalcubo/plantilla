<template>
    <div>
        <h3 class="text-center">Liquidar</h3>
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
                                Guia, Referencia, Devoluciones y Notas de Entrega
                    </router-link>
                    </td>
                <td>
                    <router-link  class="nav-link" 
                    :to="{name: '#'}">
                    Liquidacion por Lotes
                    </router-link>
                </td>
            </tr>
            <tr>
                <td>
                    <router-link  class="nav-link" 
                    :to="{name: '#'}">
                    Liquidacion de Valijas
                    </router-link>
                </td>
                <td>
                    <router-link  class="nav-link" 
                    :to="{name: '#'}">
                    Entrando por Lotes para MIA
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