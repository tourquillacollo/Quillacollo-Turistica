<template>

    <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-9">

            <h1 class="my-4">
                <small>Lista Eventos Culturales</small>
            </h1>
            <hr>

            <div class="card" style="margin-bottom: 10px;" v-for="event in events">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-2">
                            <img class="card-img-top" src="../../assets/images/calendario.png" alt="Card image cap">
                        </div>
                        <div class="col-md-10">
                            <p>
                                <a class="float-left" href="https://maniruzzaman-akash.blogspot.com/p/contact.html"><strong>{{ event.titulo }}</strong></a>
                                <span class="float-right" v-for="i in event.rate"><i class="text-warning fa fa-star"></i></span>

                            </p>
                            <div class="clearfix"></div>
                            <p v-html="event.detalle">
                            </p>
                            <p>
                                <i class="far fa-calendar-alt"></i> <b>Tipo:</b> {{event.tipo}} <br>
                                <i class="fas fa-calendar-week"></i> <b>Direccion:</b> {{event.location}}
                            </p>
                            <p>
                                <i class="fa fa-calendar"></i> <b>Fecha inicio:</b> {{ event.fecha_ini }} /
                                <i class="fa fa-calendar"></i> <b>Fecha Fin:</b> {{ event.fecha_fin }}
                            </p>
                            <!--<p>-->
                            <!--<a class="float-right btn text-white btn-danger" v-show="comment.like"> <i class="fa fa-heart"></i> Like</a>-->
                            <!--</p>-->
                        </div>
                    </div>
                </div>
            </div>


            <!-- Pagination -->
            <ul class="pagination justify-content-center mb-4">
                <li class="page-item">
                    <a class="page-link" href="#">&larr; Older</a>
                </li>
                <li class="page-item disabled">
                    <a class="page-link" href="#">Newer &rarr;</a>
                </li>
            </ul>

        </div>

        <!-- Sidebar Widgets Column -->
        <div class="col-md-3">

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
            <!-- Side Widget -->
            <div class="card my-4">
                <h5 class="card-header"><i class="far fa-calendar-alt"></i> Calendario</h5>
                <div class="card-body">
                    <div class="mobile-wrapper">
                        <!--======= Upcoming Events =======-->

                        <section class="upcoming-events">
                            <div class="container">
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
            this.axios.get('/api/events/type/Culturales')
                .then(data => {
                    this.events = data.data.event;
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
                events: [],
                topevents:[]
            }
        }
    }
</script>

<style scoped>

</style>