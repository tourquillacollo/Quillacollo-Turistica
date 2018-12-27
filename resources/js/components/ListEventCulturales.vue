<template>

    <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">

            <h1 class="my-4">Lista
                <small>Eventos</small>
            </h1>

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

            <!-- Categories Widget -->
            <div class="card my-4">
                <h5 class="card-header">Categories</h5>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <ul class="list-unstyled mb-0">
                                <li>
                                    <a href="#">Web Design</a>
                                </li>
                                <li>
                                    <a href="#">HTML</a>
                                </li>
                                <li>
                                    <a href="#">Freebies</a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-lg-6">
                            <ul class="list-unstyled mb-0">
                                <li>
                                    <a href="#">JavaScript</a>
                                </li>
                                <li>
                                    <a href="#">CSS</a>
                                </li>
                                <li>
                                    <a href="#">Tutorials</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

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
            this.axios.get('/api/events/type/Culturales')
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