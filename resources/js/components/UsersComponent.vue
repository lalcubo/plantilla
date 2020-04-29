<template>
    <div>
        <h3>Listado de usuarios</h3>
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th width="10px"></th>
                    <th>Nombre</th>
                    <th colspan="3">&nbsp;</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(user, index) in users" :key="index">
                    <td>{{ user.id }}</td>
                    <td>{{ user.name }}</td>
                    <td width="10px" v-if="permiso('users.show')">
                        <router-link 
                            class="btn btn-sm btn-light" 
                            :to="{name: 'users-show', params: {id: user.id}}">
                            <p>Ver</p>
                        </router-link>
                    </td>
                    <td width="10px" v-if="permiso('users.edit')">
                        <router-link 
                            class="btn btn-sm btn-light" 
                            :to="{name: 'users-edit', params: {id: user.id}}">
                            <p>Editar</p>
                        </router-link>
                    </td>
                    <td width="10px" v-if="permiso('users.destroy')">
                        <button class="btn btn-sm btn-danger" @click="borrar(user.id)">
                            <p>Borrar</p>
                        </button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    export default {
        data(){
            return{
                users: [],
                permissions: [],
            }
        },
        created(){
            axios.get('../public/users')
            .then(res => {
                //this.usuario = App.miusuario;
                //console.log(res);
                this.users = res.data.users;
                this.permissions = res.data.permissions;
            })
        },
        methods:{
            permiso(slug){
                const resultado = this.permissions.find( quien => quien === slug );
                if(resultado)
                    return true;
                else
                    return false;
            }
        }
    }
</script>