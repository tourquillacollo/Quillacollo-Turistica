<template>
    <div class="container">
        <h1><i class="fa fa-pencil"></i> Lista de Servicios</h1>
        <hr>
        <div class="row">
            <div class="card">
                <div class="card-header">
                    <div class="float-right">
                        <a v-on:click="onClickNewService()" style="cursor:pointer;color:orange;">
                            <i class="fas fa-plus"></i> Nuevo Servicio
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th scope="col">Nombre</th>
                            <!--<th scope="col">Detalle</th>-->
                            <th scope="col">Direccion</th>
                            <th scope="col">Telefono</th>
                            <th scope="col">Acciones</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-for="service in services" :key="service.id">
                            <td>{{ service.service_name }}</td>
                            <!--<td>{{ service.detail }}</td>-->
                            <td>{{ service.address }}</td>
                            <td>{{ service.telephone }}</td>
                            <td>
                                <a v-on:click="onClickEdit(service.id)" style="cursor:pointer;color:green;"><i class="fa fa-edit"></i> Editar</a> |
                                <a v-on:click="onClickDelete(service.id)" style="cursor:pointer;color:red;"><i class="fas fa-times"></i> Eliminar</a>
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
            this.axios.get('api/services')
                .then(response => {
                    this.services = response.data.services;
                });
        },
        data() {
            return {
                services: []
            }
        },
        methods: {
            onClickNewService() {
                window.location = "/services/new";
            },
            onClickDelete(idService) {
                if(confirm('Realmente quieres eliminar el Servicio?')) {
                    let uri = `api/services/${idService}`;
                    this.axios.delete(uri).then(response => {
                        this.services.splice(this.services.indexOf(idService), 1);
                        this.$toast.success({
                            title:'Service Eliminado',
                            message:'El Service eliminado con exito!!'
                        });
                    });
                }
            },
            onClickEdit(idService) {
                window.location = "/services/" + idService;
            }

        }
    }
</script>

<style scoped>

</style>