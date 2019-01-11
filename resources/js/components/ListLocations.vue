<template>
    <div class="container">
        <h1> <i class="fa fa-sitemap"></i> Lista de Lugares</h1>
        <hr>
        <div class="row">
            <div class="card">
                <div class="card-header">
                    Lista de lugares
                        <div class="float-right">
                            <button type="button" class="btn btn-primary" v-on:click="onClickNewLocation()">
                                <i class="fas fa-plus"></i> Nuevo Lugar
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
                                <button type="button" class="btn btn-success" v-on:click="onClickEdit(location.id)"><i class="fa fa-edit"></i></button>
                                <button type="button" class="btn btn-danger" v-on:click="onClickDelete(location.id)"><i class="fas fa-times"></i></button>
                                <button type="button" class="btn btn-warning" v-on:click="onClickShowGallery(location.id)"><i class="fas fa-image"></i></button>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>

        </div><!--/row-->

        <!-- Modal -->
        <div class="modal" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Modal body text goes here.</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary">Save changes</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>


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
                if(confirm('Realmente quiere eliminar el lugar?')) {
                    let uri = `api/location/delete/${id}`;
                    this.axios.delete(uri).then(response => {
                        this.locations.splice(this.locations.indexOf(id), 1);
                        this.$toast.success({
                            title:'Lugar Eliminado',
                            message:'El Lugar eliminado con exito!!'
                        });
                    });
                }

            },
            onClickDetail() {
                console.log('Detallar ...');
            },
            onClickNewLocation() {
                window.location = "/editLocation/new";
            },
            onClickShowGallery(idLocation) {
                window.location ="/loadLocationGallery/" +idLocation;
            },
            onClickEdit(idLocation) {
                window.location = `/editLocation/${idLocation}`;
            }
        }
    }
</script>
