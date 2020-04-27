<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Producto</div>

                    <div class="card-body">
                        <p><strong>Nombre</strong> {{ this.products.name }} </p>
                        <p><strong>Descripción</strong> {{ this.products.description }}  </p>
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
        products: [],
        }
    },
    created(){
        axios.get(`../public/products/${this.id}`)
        .then(res => {
            this.products = res.data;
            //console.log(this.products);
        })
    },
}
</script>