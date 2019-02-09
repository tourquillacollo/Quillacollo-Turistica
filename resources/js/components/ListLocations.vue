<template>
    <div class="container">
        <h1> <i class="fa fa-sitemap"></i> Lista de Lugares</h1>
        <hr>
        <div class="row">
            <div class="card">
                <div class="card-header">
                        <div class="float-right">
                            <a v-on:click="onClickNewLocation()" style="cursor:pointer;color:orange;">
                                <i class="fas fa-plus"></i> Nuevo Lugar
                            </a>
                        </div>
                </div>
                <div class="card-body">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th scope="col">Nombre</th>
                            <th scope="col">Tipo</th>
                            <!--<th scope="col">Datos Referencia</th>-->
                            <th scope="col">Creado</th>
                            <th scope="col">Acciones</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-for="location in locations" :key="location.id">
                            <td>{{ location.nombre }}</td>
                            <td>{{ location.type }}</td>
                            <!--<td><p v-html="location.datos_referencia"></p></td>-->
                            <td>{{ location.created_at }}</td>
                            <td>
                                <a v-on:click="onClickEdit(location.id)" style="cursor:pointer;color:green;"><i class="fa fa-edit"></i> Editar </a> |
                                <a v-on:click="onClickShowGallery(location.id)" style="cursor:pointer;color:blue;"><i class="fas fa-image"></i> Galeria</a> |
                                <a v-on:click="onClickDelete(location.id)" style="cursor:pointer;color:red;"><i class="fas fa-times"></i> Eliminar</a>
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
