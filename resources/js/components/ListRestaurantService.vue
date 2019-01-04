<template>
    <div>
        <!-- Page Heading -->
        <h1 class="my-4">Servicios
            <small>Restaurantes</small>
        </h1>
        <hr>
        <!-- Project One -->
        <div class="row" v-for="restaurant in restaurants">
            <div class="col-md-3">
                <a href="#">
                    <img class="img-fluid rounded mb-3 mb-md-0" src="../../assets/images/image_2.jpg" width="250" alt="">
                </a>
            </div>
            <div class="col-md-9">
                <h3>{{ restaurant.service_name }}</h3>
                <hr>
                <p>{{ restaurant.address }}</p>
                <a class="btn btn-primary" href="#">{{ restaurant.telephone }}</a>
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
            this.axios.get('api/services/getservices/Restaurantes')
                .then(data => {
                    console.log(data);
                    this.restaurants = data.data.services;
                })
                .catch(e => {
                    console.log(e);
                })
        },
        data() {
            return {
                restaurants: []
            }
        }
    }
</script>

<style scoped>

</style>