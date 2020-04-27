<template>
    <div>
        <h3>Listado de productos</h3>
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th width="10px"></th>
                    <th>Nombre</th>
                    <th colspan="3">&nbsp;</th>
                </tr>
            </thead>
        <tbody>
            <tr v-for="(item, index) in products" :key="index">
                <td>{{ item.id }}</td>
                <td>{{ item.name }}</td>
                <td width="10px" v-if="permiso('products.show')">
                    <router-link 
                        class="btn btn-sm btn-light" 
                        :to="{name: 'component-show', params: {id: item.id}}">
                        <p>Ver</p>
                    </router-link>
                </td>
                <td width="10px" v-if="permiso('products.edit')">
                    <router-link 
                        class="btn btn-sm btn-light" 
                        :to="{name: 'component-edit'}">
                        <p>Editar</p>
                    </router-link>
                </td>
                <td width="10px" v-if="permiso('products.destroy')">
                    <router-link 
                        class="btn btn-sm btn-danger" 
                        :to="{name: 'component-destroy'}">
                        <p>Borrar</p>
                    </router-link>
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
                products: [],
                nota: {nombre: '', descripcion:''},
                permissions: [],
                usuario: '',
                editarActivo: false,
            }
        },
        created(){
            axios.get('../public/products')
            .then(res => {
                this.usuario = App.miusuario;
                //console.log(this.res);
                this.products = res.data.products.data;
                this.permissions = res.data.permissions;
            })
        },
        methods:{
            agregar(){
                
                if(this.nota.nombre.trim() === '' || this.nota.descripcion.trim() === ''){
                    alert('Debes completar todos los campos antes de guardar');
                    return;
                }
                //console.log(this.nota.nombre, this.nota.descripcion);
                const params = {
                    nombre: this.nota.nombre,
                    descripcion: this.nota.descripcion
                }
                this.nota.nombre = '';
                this.nota.descripcion = '';
                axios.post('../public/products',params)
                .then(res => {
                    this.products.push(res.data)   
                    })
                },
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