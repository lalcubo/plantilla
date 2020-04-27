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
                                <input type="checkbox"
                                :value="permission.id" 
                                @click="marcar(permission)">
                                {{ permission.description }}
                            </label>
                        </li>
                    </ul>
                    <hr>
                </div>
                <button class="btn btn-sm btn-primary" @click="crear">Crear</button>
            </div>
        </div>
    </div>
</template>
<<script>
export default {
    data(){
        return{
            permissions: [],
            permisos_act: [],
            role: {
                'name': '',
                'slug': '',
                'description': '',
            },
        }
    },
    created(){
        axios.get(`../public/roles/create`)
        .then(res => {
            this.permissions = res.data.permissions;
            //console.log(res);
        })
        .catch(error => {
            console.log(error);
        })
    },
    methods: {
        crear(){
            let data = {
                role: this.role,
                permissions: this.permisos_act
            };
            axios.post(`../public/roles/store`,data)
            .then(res => {
                alert(res.data.message);
                //console.log(res);
            })
            .catch(error => {
                console.log(error);
            })
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
    },
}
</script>