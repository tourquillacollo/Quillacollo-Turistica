<template>
    <div class="row">
        <!-- Blog Entries Column -->
        <div class="col-md-8">

            <h2 class="my-4">
                Circuito Ecologico
            </h2>
            <hr>
            <div class="row">
                <div class="card" style="width: 18rem; margin-left:10px;margin-bottom: 10px;" v-for="lugar in lugares">
                    <img class="card-img-top" :src="'uploads/lugares/' + lugar.ruta_imagen" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">{{ lugar.nombre }}</h5>
                        <p class="card-text"></p>
                        <a href="#" class="btn btn-primary" v-on:click="showLocation(lugar.id)">Ver Lugar</a>
                    </div>
                </div>
            </div>

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

        <!-- Sidebar Widgets Column -->
        <div class="col-md-4">

            <!-- Search Widget -->
            <!--<div class="card my-4">-->
            <!--<h5 class="card-header">Buscar</h5>-->
            <!--<div class="card-body">-->
            <!--<div class="input-group">-->
            <!--<input type="text" class="form-control" placeholder="Search for...">-->
            <!--<span class="input-group-btn">-->
            <!--<button class="btn btn-secondary" type="button">Go!</button>-->
            <!--</span>-->
            <!--</div>-->
            <!--</div>-->
            <!--</div>-->

            <!-- Side Widget -->
            <div class="card my-4">
                <h5 class="card-header">Calendario</h5>
                <div class="card-body">
                    You can put anything you want inside of these side widgets. They are easy to use, and feature the new Bootstrap 4 card containers!
                </div>
            </div>

        </div>

    </div>
</template>

<script>
    export default {
        mounted() {
            this.axios.get('api/location/circuit/Ecologico')
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
        },
        methods: {
            showLocation(idLocation) {
                console.log(idLocation);
                window.location = '/showlocation/' + idLocation;
            }
        }
    }
</script>

<style scoped>

</style>