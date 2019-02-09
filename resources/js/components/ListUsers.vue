<template>
    <div class="container">
        <h1><i class="fa fa-user"></i> Lista de Usuarios</h1>
        <hr>
        <div class="row">
            <div class="card">
                <div class="card-header">
                    <div class="float-right">
                        <a v-on:click="onClickNewUser()" style="cursor:pointer;color:orange;">
                            <i class="fas fa-plus"></i> Nuevo Usuario
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th scope="col">Rol</th>
                            <th scope="col">Email</th>
                            <th scope="col">Creado</th>
                            <th scope="col">Acciones</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-for="user in users" :key="user.id">
                            <td>{{ user.name }}</td>
                            <td>{{ user.email }}</td>
                            <td>{{ user.created_at }}</td>
                            <td>
                                <a v-on:click="onClickEdit(user.id)" style="cursor:pointer;color:green;"><i class="fa fa-edit"></i> Editar</a> |
                                <a v-on:click="onClickDelete(user.id)" style="cursor:pointer;color:red;"><i class="fas fa-times"></i> Eliminar</a>
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
            this.axios.get('api/users')
                .then(response => {
                    this.users = response.data.users
                });
        },
        data() {
            return {
                users: []
            }
        },
        methods: {
            onClickNewUser() {
                window.location = "/registeruser/new";
            },
            onClickDelete(idUser) {
                if(confirm('Realmente quieres eliminar el Usuario')) {
                    let uri = `api/users/delete/${idUser}`;
                    this.axios.delete(uri).then(response => {
                        this.users.splice(this.users.indexOf(idUser), 1);
                        this.$toast.success({
                            title:'Usuario Eliminado',
                            message:'El Usuario eliminado con exito!!'
                        });
                    });
                }

            },
            onClickEdit(idUser) {
                window.location = "/registeruser/" + idUser;
            }

        }
    }
</script>

<style scoped>

</style>