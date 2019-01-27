<template>
    <div class="row">
        <!-- Blog Entries Column -->
        <div class="col-md-8">

            <h2 class="my-4">
                Circuito Arqueologico
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
        <div class="col-md-4">
            <!-- Side Widget -->
            <div class="card my-4">
                <h5 class="card-header"><i class="far fa-calendar-alt"></i> Calendario</h5>
                <div class="card-body">
                    <div class="mobile-wrapper">
                        <!--======= Upcoming Events =======-->

                        <section class="upcoming-events">
                            <div class="container">
                                <h3>
                                    <img class="card-img-top" src="../../assets/images/calendar_icon.png" alt="Card image cap" width="100"> Ultimos eventos
                                </h3>
                                <div class="events-wrapper">
                                    <div class="event" v-for="event in topevents">
                                        <i class="ion ion-ios-flame hot"></i>
                                        <h4 class="event__point">{{event.fecha_ini}} - {{event.fecha_fin}}</h4>
                                        <span class="event__duration"> {{event.titulo}} </span>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>

                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            this.axios.get('api/location/circuit/Arqueologico')
                .then(data => {
                    console.log(data);
                    this.lugares = data.data.circuits;
                })
                .catch(e => {
                    console.log(e);
                });
            this.axios.get('/api/events/topevents')
                .then(data => {
                    this.topevents = data.data.events;
                })
                .catch(e => {
                    console.log(e);
                });
        },
        data() {
            return {
                lugares: [],
                topevents:[]
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