<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Usuario</div>

                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                    <tbody>
                        <tr>
                            <td><strong>ID</strong></td>
                            <td> <input type="text" v-model="user.id"></td>
                        </tr>
                        <tr>
                            <td><strong>Nombre</strong></td>
                            <td><input type="text" v-model="user.name"></td>
                        </tr>
                    </tbody>
                    </table>
                    <hr>
                    <h3>Roles</h3>
                    <ul class="list-unstyled">
                        <li v-for="(role,index) in roles" :key="index">
                            <label>
                                <input type="checkbox" :checked="checked(role.id,'role')"
                                :value="role.id" @click="marcar(role,'roles_act')">
                                {{ role.name }}
                            </label>
                        </li>
                    </ul>
                    <hr>
                    <h3>Permisos individual</h3>
                    <ul class="list-unstyled">
                        <li v-for="(permission,index) in permissions" :key="index">
                            <label>
                                <input type="checkbox" :checked="checked(permission.id,'permission')"
                                :value="permission.id" @click="marcar(permission,'permisos_user')">
                                {{ permission.name }}
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
            permissions: [],
            user: [],
            permisos_user: [],
            roles: [],
            roles_act: [],
        }
    },
    created(){
        axios.get(`../public/users/${this.id}/edit`)
        .then(res => {
            this.permissions = res.data.permissions;
            this.user = res.data.user;
            this.permisos_user = res.data.permisos_user
            this.roles = res.data.roles;
            this.roles_act = res.data.roles_act;
            //console.log(res);
        })
        .catch(error => {
            if(error.response.status == 403)
                alert('no tiene permisos para actualizar sera redirigido');
                this.$router.push('/blanco');
        })
    },
    methods: {
        checked(id,quien){
            let resultado = '';
            if(quien=='role'){
                resultado = this.roles_act.find( busca => busca === id );
            }
            else{
                resultado = this.permisos_user.find( busca => busca === id );
            }

            if(resultado){
                return true;
            }
            else{
                return false;
            }
        },
        marcar(quien,identif){

            let evalua = `this.${identif}.find(busca => busca === ${quien.id})`;
            //alert(evalua)
            let resultado = eval(evalua);
            //alert(resultado)
            if(resultado){
                let ind = 0;
                let evalua2 = `this.${identif}.indexOf(${resultado})`;
                ind = eval(evalua2);
                if ( ind !== -1 ) {
                    let cadena = `this.${identif}.splice(${ind},1)`;
                    eval(cadena);
                }
            }
            else{
                let cadena = `this.${identif}.push(${quien.id})`;
                //alert(cadena)
                eval(cadena)
            }
            /*if(identif == 'role'){
                resultado = this.roles_act.find( busca => busca === quien.id );
            }else{
                resultado = this.permisos_user.find( busca => busca === quien.id );
            }
            
            if(resultado){
                let ind = 0;
                if(identif == 'role')
                    ind = this.roles_act.indexOf(resultado);
                else
                    ind = this.permisos_user.indexOf(resultado);
                if ( ind !== -1 ) {
                    if(identif == 'role')
                        this.roles_act.splice( ind, 1 );
                    else
                        this.permisos_user.splice( ind, 1 );
                }
            }
            else{
                if(identif == 'role')
                    this.roles_act.push(quien.id);
                else
                    this.permisos_user.push(quien.id);
            }*/
        },
        actualizar(){
            let data = {
                user: this.user,
                roles: this.roles_act,
                permissions: this.permisos_user,
            };
            axios.put(`../public/users/${this.id}`,data)
            .then(res => {
                console.log(res.data)
                //alert(res.data.message);
            })
            .catch(error => {
                //console.log(error.response);
                if(error.response.status == 403)
                    alert('no tiene permisos para actualizar');
            })
        },
    },
}
</script>