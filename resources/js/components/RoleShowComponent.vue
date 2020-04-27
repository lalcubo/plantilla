<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Role</div>

                    <div class="card-body">
                        <p><strong>Nombre</strong> {{ this.role.name }} </p>
                        <p><strong>Slug</strong> {{ this.role.slug }}  </p>
                        <p><strong>Descripción</strong> {{ this.role.description }}  </p>
                    </div>
                </div>
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
            }
    },
    created(){
        axios.get(`../public/roles/${this.id}`)
        .then(res => {
            this.role = res.data.data;
            //console.log(res);
        })
    },
}
</script>