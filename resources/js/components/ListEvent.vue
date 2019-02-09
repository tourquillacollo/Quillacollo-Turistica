<template>
    <div class="container">
        <h1> <i class="fa fa-calendar"></i> Lista de Eventos</h1>
        <hr>
        <div class="row">
            <div class="card">
                <div class="card-header">
                    <div class="float-right">
                        <a v-on:click="onClickNewLocation()" style="cursor:pointer;color:orange;">
                            <i class="fas fa-plus"></i> Nuevo Evento
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th scope="col">Titulo</th>
                            <th scope="col">Tipo</th>
                            <th scope="col">Fecha Inicio</th>
                            <th scope="col">Fecha Fin</th>
                            <th scope="col">Ubicacion</th>
                            <th scope="col">Acciones</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-for="event in events" :key="event.id">
                            <td>{{ event.titulo }}</td>
                            <td>{{ event.tipo }}</td>
                            <td>{{ event.fecha_ini }}</td>
                            <td>{{ event.fecha_fin }}</td>
                            <td>{{ event.location }}</td>
                            <td>
                                <a v-on:click="onClickEdit(event.id)" style="cursor:pointer;color:green;"><i class="fa fa-edit"></i> Editar</a> |
                                <a v-on:click="onClickDelete(event.id)" style="cursor:pointer;color:red;"><i class="fas fa-times"></i> Eliminar</a>
                                <!--<button type="button" class="btn btn-primary" v-on:click="onClickDetail()"><i class="fas fa-file"></i></button>-->
                                <!--<button type="button" class="btn btn-success" v-on:click="onClickShowGallery(location.id)"><i class="fas fa-image"></i></button>-->
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

            this.axios.get('api/events/list')
                .then(response =>{
                    this.events = response.data.data
                })
        },
        data() {
            return {
                events: []
            }
        },
        methods: {
            loadLocationList() {
                console.log('listando los locations');
            },
            onClickDelete(id) {
                if(confirm('Realmente quieres eliminar el evento?')) {
                    let uri = `api/events/delete/${id}`;
                    this.axios.delete(uri).then(response => {
                        this.events.splice(this.events.indexOf(id), 1);
                        this.$toast.success({
                            title:'Evento Eliminado',
                            message:'El Evento eliminado con exito!!'
                        });
                    });
                }
            },
            onClickDetail() {
                console.log('Detallar ...');
            },
            onClickNewLocation() {
                window.location = "/registerEvent/new";
            },
            onClickShowGallery(idLocation) {
                window.location ="/loadLocationGallery/"+idLocation;
            },
            onClickEdit(idLocation) {
                window.location = "/registerEvent/" + idLocation;
            }
        }
    }
</script>

<style scoped>

</style>