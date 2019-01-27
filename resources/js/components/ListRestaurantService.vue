<template>
    <div class="row">
        <div class="col-md-8">
            <!-- Page Heading -->
            <h1 class="my-4">
                <small>Servicios Restaurantes</small>
            </h1>
            <hr>
            <!-- Project One -->
            <div class="row">
                <div class="card" v-for="restaurant in restaurants" style="width: 18rem; margin-left:10px;">
                    <img class="card-img-top" src="../../assets/images/hoteleria.jpg" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">{{ restaurant.service_name }}</h5>
                        <hr>
                        <p class="card-text">
                            <i class="fas fa-atlas"></i> <b>Direccion:</b> {{ restaurant.address }}<br>
                            <i class="fas fa-phone-volume"></i> <b>Telefono:</b> {{ restaurant.telephone }}
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
            this.axios.get('api/services/getservices/Restaurantes')
                .then(data => {
                    console.log(data);
                    this.restaurants = data.data.services;
                })
                .catch(e => {
                    console.log(e);
                });
            this.axios.get('api/events/topevents')
                .then(data => {
                    this.topevents = data.data.events;
                })
                .catch(e => {
                    console.log(e);
                });
        },
        data() {
            return {
                restaurants: [],
                topevents:[]
            }
        }
    }
</script>

<style scoped>

</style>