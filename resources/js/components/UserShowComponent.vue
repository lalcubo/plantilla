<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Usuario</div>

                    <div class="card-body">
                        <p><strong>Id</strong> {{ this.users.id }} </p>
                        <p><strong>Nombre</strong> {{ this.users.name }}  </p>
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
        users: [],
        }
    },
    created(){
        axios.get(`../public/users/${this.id}`)
        .then(res => {
            this.users = res.data;
            //console.log(this.users);
        })
    },
}
</script>