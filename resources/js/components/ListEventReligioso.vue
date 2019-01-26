<template>

    <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">

            <h1 class="my-4">
                <small>Lista Eventos Religiosos</small>
            </h1>
            <hr>
            <!-- Blog Post -->
            <div class="card mb-4" v-for="event in events">
                <img class="card-img-top" src="../../assets/images/image_1.jpg" alt="Card image cap">
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
        <div class="col-md-4">

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
                <h5 class="card-header">Calendario</h5>
                <div class="card-body">
                    <div class="mobile-wrapper">
                        <!--======= Upcoming Events =======-->

                        <section class="upcoming-events">
                            <div class="container">
                                <h3>
                                    Lastest Events

                                </h3>
                                <div class="events-wrapper">
                                    <div class="event">
                                        <i class="ion ion-ios-flame hot"></i>
                                        <h4 class="event__point">11:00 am</h4>
                                        <span class="event__duration">in 30 minutes.</span>
                                        <p class="event__description">
                                            Monday briefing with the team (...).
                                        </p>
                                    </div>
                                    <div class="event">
                                        <i class="ion ion-ios-flame done"></i>
                                        <h4 class="event__point">12:00 pm</h4>
                                        <span class="event__duration">in 1 hour.</span>
                                        <p class="event__description">
                                            Lunch with Paul Mccartney @Burgers House!
                                        </p>
                                    </div>
                                    <div class="event active">
                                        <i class="ion ion-ios-radio-button-on icon-in-active-mode"></i>
                                        <h4 class="event__point">14:00 pm</h4>
                                        <p class="event__description">
                                            Meet clients from project.
                                        </p>
                                    </div>
                                    <div class="event">
                                        <i class="ion ion-ios-flame-outline upcoming"></i>
                                        <h4 class="event__point">20:45 pm</h4>
                                        <span class="event__duration">in 45 minutes.</span>
                                        <p class="event__description">
                                            Watch sci-fi series.
                                        </p>
                                    </div>
                                    <div class="event">
                                        <i class="ion ion-ios-flame-outline upcoming"></i>
                                        <h4 class="event__point">23:15 pm</h4>
                                        <span class="event__duration">in 20 minutes.</span>
                                        <p class="event__description">
                                            Customer dialog on Skype.
                                        </p>
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
            this.axios.get('/api/events/type/Religiosos')
                .then(data => {
                    this.events = data.data.event;
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