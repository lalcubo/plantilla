<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Role</div>

                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                    <tbody>
                        <tr>
                            <td><strong>Nombre</strong></td>
                            <td><input type="text" v-model="role.name"></td>
                        </tr>
                        <tr>
                            <td><strong>Slug</strong></td>
                            <td> <input type="text" v-model="role.slug"></td>
                        </tr>
                        <tr>
                            <td><strong>Descripción</strong></td>
                            <td><textarea v-model="role.description"></textarea></td>
                        </tr>
                    </tbody>
                    </table>
                    <hr>
                    <ul class="list-unstyled">
                        <li v-for="(permission,index) in permissions" :key="index">
                            <label>
                                <input type="checkbox" :checked="checked(permission.id)"
                                :value="permission.id" @click="marcar(permission)">
                                {{ permission.description }}
                            </label>
                        </li>
                    </ul>
                    <hr>
                </div>
                <button class="btn btn-sm btn-primary" @click="actualizar">Actualizar</button>
            </div>
        </div>
    </div>
</template>
<<script>
export default {
    props: ['id'],
    data(){
        return{
            role: [],
            permissions: [],
            permisos_act: [],
        }
    },
    methods: {
        checked(quien){
            let resultado = this.permisos_act.find( busca => busca === quien );
            //alert(resultado)
            if(resultado){
                return true;
            }
            else
                return false;
        },
        marcar(quien){
            let resultado = this.permisos_act.find( busca => busca === quien.id );
            
            if(resultado){
                let ind = this.permisos_act.indexOf(resultado);
                if ( ind !== -1 ) {
                    this.permisos_act.splice( ind, 1 );
                }
            }
            else{
                this.permisos_act.push(quien.id);
            }
        },
        actualizar(){
            let data = {
                role: this.role,
                permissions: this.permisos_act
            };
            axios.put(`../public/roles/${this.id}`,data)
            .then(res => {
                alert(res.data.message);
            })
            .catch(error => {
                if(error.response.status == 403)
                    alert('no tiene permisos para actualizar');
            })
        },
    },
    created(){
        axios.get(`../public/roles/${this.id}/edit`)
        .then(res => {
            this.role = res.data.data.role;
            this.permissions = res.data.data.permissions
            this.permisos_act = res.data.data.permisos_act
            //console.log(res);
        })
        .catch(error => {
            if(error.response.status == 403)
                alert('no tiene permisos para actualizar sera redirigido');
                this.$router.push('/blanco');
        })
    },
}
</script>