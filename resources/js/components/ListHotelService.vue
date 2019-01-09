<template>
    <div>
        <!-- Page Heading -->
        <h1 class="my-4">
            <small>Servicios Hoteles</small>
        </h1>
        <hr>
        <!-- Project One -->
        <div class="row" v-for="hotel in hoteles">
            <div class="card" style="width: 18rem;">
                <img class="card-img-top" src="../../assets/images/hoteleria.jpg" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">{{ restaurant.service_name }}</h5>
                    <p class="card-text">
                        Direccion: {{ restaurant.address }}<br>
                        Telefono: {{ restaurant.telephone }}
                    </p>

                </div>
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
            this.axios.get('api/services/getservices/Hoteles')
                .then(data => {
                    console.log(data);
                    this.hoteles = data.data.services;
                })
                .catch(e => {
                    console.log(e);
                })
        },
        data() {
            return {
                hoteles: []
            }
        }
    }
</script>

<style scoped>

</style>