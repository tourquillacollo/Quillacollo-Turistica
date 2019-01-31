<template>

    <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-9">

            <h1 class="my-4">
                <small>Lista Eventos Religiosos</small>
            </h1>

            <!-- Blog Post -->
            <div class="card mb-4" v-for="event in events">
                <img class="card-img-top" src="../../assets/images/hoteleria.jpg" alt="Card image cap">
                <div class="card-body">
                    <h2 class="card-title">{{ event.titulo }}</h2>
                    <p class="card-text">{{ event.detalle }}</p>
                    <a href="#" class="btn btn-primary">Saber mas</a>
                </div>
                <div class="card-footer text-muted">
                    Fecha inicio :{{ event.fecha_ini }} - Fecha Fin: {{ event.fecha_fin }}

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
            <div class="card my-4">
                <h5 class="card-header">Buscar</h5>
                <div class="card-body">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search for...">
                        <span class="input-group-btn">
                  <button class="btn btn-secondary" type="button">Go!</button>
                </span>
                    </div>
                </div>
            </div>

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
            this.axios.get('api/events/list')
                .then(data => {
                    this.events = data.data.data;
                })
                .catch(e => {
                    console.log(e);
                })
        },
        data() {
            return {
                events: []
            }
        }
    }
</script>

<style scoped>

</style>