<template>
    <div>
        <!-- Page Heading -->
        <h1 class="my-4">Circuito
            <small>Ecologico</small>
        </h1>
        <hr>
        <!-- Project One -->
        <div class="row" v-for="lugar in lugares">
            <div class="col-md-7">
                <a href="#">
                    <img class="img-fluid rounded mb-3 mb-md-0" src="../../assets/images/image_1.jpg" alt="">
                </a>
            </div>
            <div class="col-md-5">
                <h3>{{ lugar.nombre }}</h3>
                <hr>
                <p>{{ lugar.datos_referencia }}</p>
                <a class="btn btn-primary" href="#">Ver lugar</a>
            </div>
        </div>
        <!-- /.row -->

        <hr>

        <!-- Pagination -->
        <ul class="pagination justify-content-center">
            <li class="page-item">
                <a class="page-link" href="#" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                    <span class="sr-only">Previous</span>
                </a>
            </li>
            <li class="page-item">
                <a class="page-link" href="#">1</a>
            </li>
            <li class="page-item">
                <a class="page-link" href="#">2</a>
            </li>
            <li class="page-item">
                <a class="page-link" href="#">3</a>
            </li>
            <li class="page-item">
                <a class="page-link" href="#" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                    <span class="sr-only">Next</span>
                </a>
            </li>
        </ul>
    </div>
</template>

<script>
    export default {
        mounted() {
            this.axios.get('api/location/cicuit/Ecologico')
                .then(data => {
                    console.log(data);
                    this.lugares = data.data.circuits;
                })
                .catch(e => {
                    console.log(e);
                })
        },
        data() {
            return {
                lugares: []
            }
        }
    }
</script>

<style scoped>

</style>