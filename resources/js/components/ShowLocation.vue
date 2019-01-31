<template>
    <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-9">

            <!-- Portfolio Item Heading -->
            <h2 class="my-4">
                {{location.nombre}}
            </h2>
            <hr>
            <!-- Portfolio Item Row -->
            <div class="row container-fluid">

                <div class="row">
                    <div class="col-9">
                        <img class="img-fluid" :src="'../uploads/lugares/' + files[0].ruta_imagen" alt="">
                    </div>
                    <div class="col-3">
                        <img v-for="file in files" class="img-fluid" :src="'../uploads/lugares/'+file.ruta_imagen" alt="">
                    </div>

                </div>
                <div class="col-12">
                <!--<div class="col-md-4">-->
                    <h3>Descripcion</h3>
                    <hr>
                    <div>
                        <p v-html="location.datos_referencia">

                        </p>
                    </div>

                    <h3>Datos</h3>
                    <ul>
                        <li><b>Circuito:</b> {{location.ubicacion}}</li>
                        <li><b>Registrado:</b> {{location.created_at}}</li>
                    </ul>
                </div>

            </div>
            <!-- /.row -->
            <!-- /.row -->

            <h4 class="my-4">
                Comentarios
            </h4>
            <hr>

            <div class="card" style="margin-bottom: 10px;" v-for="comment in comments">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-2">
                            <img src="https://image.ibb.co/jw55Ex/def_face.jpg" class="img img-rounded img-fluid"/>
                            <p class="text-secondary text-center">
                                <b>{{ comment.created_at }}</b>
                            </p>
                        </div>
                        <div class="col-md-10">
                            <p>
                                <a class="float-left" href="https://maniruzzaman-akash.blogspot.com/p/contact.html"><strong>{{ comment.name }}</strong></a>
                                <span class="float-right" v-for="i in comment.rate"><i class="text-warning fa fa-star"></i></span>

                            </p>
                            <div class="clearfix"></div>
                            <p>
                                {{ comment.content }}
                            </p>
                            <p>
                                <a class="float-right btn text-white btn-danger" v-show="comment.like"> <i class="fa fa-heart"></i> Like</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card card-info">
                <div class="card-body">

                    <div class="starrating risingstar d-flex justify-content-right flex-row-reverse">
                        <input type="radio" id="star5" name="rating" value="5" v-on:change="rateLocation(5)" /><label for="star5" title="5 star"></label>
                        <input type="radio" id="star4" name="rating" value="4" v-on:change="rateLocation(4)" /><label for="star4" title="4 star" ></label>
                        <input type="radio" id="star3" name="rating" value="3" v-on:change="rateLocation(3)" /><label for="star3" title="3 star" ></label>
                        <input type="radio" id="star2" name="rating" value="2" v-on:change="rateLocation(2)" /><label for="star2" title="2 star" ></label>
                        <input type="radio" id="star1" name="rating" value="1" v-on:change="rateLocation(1)" /><label for="star1" title="1 star"></label>
                    </div>

                    <textarea placeholder="Escribe tu comentario aqui!" class="form-control pb-cmnt-textarea" v-model="comment.content"></textarea>
                    <br>
                    <button class="btn btn-primary float-xs-right" type="button" v-on:click="commentLocation()"><i class="fa fa-reply"></i> Comentar</button>
                    <a class="float-right btn text-white btn-danger" v-show="!comment.like" v-on:click="likeLocation()"> <i class="fa fa-heart"></i> Like</a>
                </div>
            </div>

        </div>

        <!-- Sidebar Widgets Column -->
        <div class="col-md-3">

            <!--&lt;!&ndash; Search Widget &ndash;&gt;-->
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
            this.comment.id_location = this.$route.path.split('/')[2];
            this.axios.get('../api/location/' + this.comment.id_location)
                .then(response =>{
                    this.location = response.data.location;
                });
            this.axios.get(`../api/location/files/${this.comment.id_location}`)
                .then(data => {
                    this.files = data.data.images;
                })
                .catch(e => {
                    this.$toast.error({
                        title:'Error servicio',
                        message:'No se pudo optener el nombre del del lugar!!'
                    });
                });

            this.axios.get(`../api/location/comments/${this.comment.id_location}`)
                .then(data => {
                    this.comments = data.data.comments;
                })
                .catch( e => {
                    this.$toast.error({
                        title:'Error servicio',
                        message:'No se pudo optener el nombre del del lugar!!'
                    });
                });
            this.axios.get('../api/events/topevents')
                .then(data => {
                    this.topevents = data.data.events;
                })
                .catch(e => {
                    console.log(e);
                });

        },
        data() {
            return {
                location: [],
                idLocation: 0,
                files:[],
                comments :[],
                comment : {
                    content : '',
                    rate: 0,
                    like: false,
                    id_location : 0,
                    id_user: 0
                },
                topevents:[]
            }
        },
        methods: {
            showLocation(idLocation) {
                console.log(idLocation);
             //   window.location = '/showlocation/' + idLocation;
            },

            likeLocation() {
                if(document.getElementById('id_user').value != 0) {
                    this.comment.like = true;
                } else {
                    this.$toast.warn({
                        title:'Usuario no autorizado',
                        message:'El usuario no esta autorizado para comentar'
                    });
                }
            },

            rateLocation(rate) {
                if(document.getElementById('id_user').value != 0) {
                    this.comment.rate = rate;
                } else {
                    this.$toast.warn({
                        title:'Usuario no autorizado',
                        message:'El usuario no esta autorizado para comentar'
                    });
                }
            },

            commentLocation() {
                if(document.getElementById('id_user').value != 0) {
                    this.comment.id_user = document.getElementById('id_user').value;
                    this.axios.post('../api/location/comments', this.comment)
                        .then(data => {
                            this.comments = data.data.comments;
                            window.location.reload();
                        })
                        .catch(e => {
                            console.log(e);
                        });
                } else {
                    this.$toast.warn({
                        title:'Usuario no autorizado',
                        message:'El usuario no esta autorizado para comentar'
                    });
                }

            }
        }
    }
</script>

<style scoped>

</style>