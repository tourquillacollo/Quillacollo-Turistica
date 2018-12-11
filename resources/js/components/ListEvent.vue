<template>
    <div>
        <h1>Lista de Eventos</h1>
        <hr>
        <div class="row">
            <div class="card">
                <div class="card-header">
                    Lista de Eventos
                    <div class="float-right">
                        <button type="button" class="btn btn-primary" v-on:click="onClickNewLocation()">
                            <i class="fas fa-plus"></i> Nuevo Evento
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th scope="col">Nombre</th>
                            <th scope="col">Tipo</th>
                            <th scope="col">Datos Referencia</th>
                            <th scope="col">Creado</th>
                            <th scope="col">Acciones</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-for="location in locations" :key="location.id">
                            <td>{{ location.nombre }}</td>
                            <td>{{ location.type }}</td>
                            <td>{{ location.datos_referencia }}</td>
                            <td>{{ location.created_at }}</td>
                            <td>
                                <button type="button" class="btn btn-danger" v-on:click="onClickDelete(location.id)"><i class="fas fa-times"></i></button>
                                <!--<button type="button" class="btn btn-primary" v-on:click="onClickDetail()"><i class="fas fa-file"></i></button>-->
                                <button type="button" class="btn btn-success" v-on:click="onClickShowGallery(location.id)"><i class="fas fa-image"></i></button>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>

        </div><!--/row-->
    </div>
</template>

<script>
    export default {
        mounted() {
            this.axios.get('api/location/list')
                .then(response =>{
                    this.locations = response.data.data
                })
        },
        data() {
            return {
                locations: []
            }
        },
        methods: {
            loadLocationList() {
                console.log('listando los locations');
            },
            onClickDelete(id) {
                let uri = `api/location/delete/${id}`;
                this.axios.delete(uri).then(response => {
                    this.locations.splice(this.locations.indexOf(id), 1);
                    this.$toast.success({
                        title:'Lugar Eliminado',
                        message:'El Lugar eliminado con exito!!'
                    });
                });
            },
            onClickDetail() {
                console.log('Detallar ...');
            },
            onClickNewLocation() {
                window.location = "/registerEvent";
            },
            onClickShowGallery(idLocation) {
                window.location ="/loadLocationGallery/"+idLocation;
            }
        }
    }
</script>

<style scoped>

</style>