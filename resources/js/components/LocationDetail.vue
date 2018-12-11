<template>
    <div>
        <!-- Portfolio Item Heading -->
        <h1 class="my-4">Lugar:
            <small> {{ location.nombre }}</small>
        </h1>
        <hr>
        <!-- Portfolio Item Row -->
        <div class="row">

            <div class="col-md-8">
                <img src="../../assets/images/01.jpg" alt="image1" width="100%" height="100%">
            </div>

            <div class="col-md-4">
                <h3 class="my-3">Datos de Referencia</h3>
                <hr>
                <p>
                    {{ location.datos_referencia }}</p>
                <h3 class="my-3">Datos de Ubicacion</h3>
                <hr>
                <ul>
                    <li>Lorem Ipsum</li>
                    <li>Dolor Sit Amet</li>
                    <li>Consectetur</li>
                    <li>Adipiscing Elit</li>
                </ul>
            </div>

        </div>
        <!-- /.row -->

        <!-- Related Projects Row -->
        <h3 class="my-4">Imagenes del Lugar</h3>
        <hr>
        <div class="row">

            <div class="col-md-3 col-sm-6 mb-4" v-for="file in files">
                <a href="#">{{ file.ruta_imagen }}
                    <img src="../../assets/images/02.jpg" alt="image1" width="100%" height="100%">
                </a>
            </div>
        </div>
        <h3 class="my-4">Ubicacion</h3>
        <hr>
        <div class="row">
            <img src="../../assets/images/map_cbba.png" alt="" width="100%">
        </div>
    </div>
    <!-- /.row -->
</template>

<script>
    export default {
        name: "LocationDetail",
        mounted() {
            const idLocation = this.$route.path.split('/')[2];
            this.axios.get('../api/location/' + idLocation)
                .then(response =>{
                    this.location = response.data.location;
                });
            this.axios.get(`../api/location/files/${idLocation}`)
                .then(data => {
                    this.files = data.data.images;

                })
                .catch(e => {
                    this.$toast.error({
                        title:'Error servicio',
                        message:'No se pudo optener el nombre del del lugar!!'
                    });
                });
            console.log(this.files)
        },
        data() {
            return {
                location: [],
                files: []
            }
        },
        methods: {

        }
    }
</script>

<style scoped>

</style>