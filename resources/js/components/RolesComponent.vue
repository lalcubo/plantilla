<template>
    <div>
        <h3>Listado de roles
            <router-link 
                class="btn btn-sm btn-primary float-right" 
                :to="{name: 'roles-create'}" v-if="permiso('roles.create')">
                <p>Crear</p>
            </router-link>
        </h3>
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th width="10px"></th>
                    <th>Role</th>
                    <th colspan="3">&nbsp;</th>
                </tr>
            </thead>
        <tbody>
            <tr v-for="(item, index) in roles" :key="index">
                <td>{{ item.id }}</td>
                <td>{{ item.name }}</td>
                <td width="10px" v-if="permiso('roles.show')">
                    <router-link 
                        class="btn btn-sm btn-light" 
                        :to="{name: 'roles-show', params: {id: item.id}}">
                        <p>Ver</p>
                    </router-link>
                </td>
                <td width="10px" v-if="permiso('roles.edit')">
                    <router-link 
                        class="btn btn-sm btn-light" 
                        :to="{name: 'roles-edit', params: {id: item.id}}">
                        <p>Editar</p>
                    </router-link>
                </td>
                <td width="10px" v-if="permiso('roles.destroy')">
                    <button class="btn btn-sm btn-danger" @click="borrar(item.id)">
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
                roles: [],
                permissions: [],
                usuario: '',
                editarActivo: false,
            }
        },
        created(){
            axios.get('../public/roles')
            .then(res => {
                //this.usuario = App.miusuario;
                //console.log(res);
                this.roles = res.data.roles.data;
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
            },
            actualizar(){
                axios.get('../public/roles')
                .then(res => {
                this.roles = res.data.roles.data;
                this.permissions = res.data.permissions;
            })
            },
            borrar(id){
                let eliminar=confirm("¿Deseas eliminar el role?");
                    if (eliminar){
                        axios.delete(`../public/roles/${id}`)
                        .then(res => {
                            alert(res.data.message);
                            this.actualizar();
                        })
                        .catch(error => {
                            alert('ocurrio un error');
                        })
                    }
            },
        }
    }
</script>