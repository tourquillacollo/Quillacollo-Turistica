<template>
    <div class="container">
        <h1><i class="fa fa-user"></i> Nuevo Usuario</h1>
        <hr>
        <div class="row m-y-2">
            <div class="col-lg-8 push-lg-4 personal-info">
                <form role="form"  @submit.prevent="formSubmit" enctype="multipart/form-data">
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label form-control-label">Nombre</label>
                        <div class="col-lg-9">
                            <input class="form-control"  type="text" value="" v-model="form.name"/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label form-control-label">Cargo</label>
                        <div class="col-lg-9">
                            <select  class="form-control" size="0" v-model="form.role">
                                <option value="1">Usuario</option>
                                <option value="2">Director</option>
                                <option value="3">Administrador</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label form-control-label">Email</label>
                        <div class="col-lg-9">
                            <input class="form-control"  type="text" value="" v-model="form.email"/>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label form-control-label">Password</label>
                        <div class="col-lg-9">
                            <input class="form-control" type="password" value="" placeholder="Password" v-model="form.password"/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label form-control-label">Confirmar Password</label>
                        <div class="col-lg-9">
                            <input class="form-control" type="password" value="" placeholder="Confirmar Password" v-model="form.confirm_password"/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label form-control-label"></label>
                        <div class="col-lg-9">
                            <input type="reset" class="btn btn-secondary" value="Cancelar" />
                            <input type="submit" class="btn btn-primary" value="Guardar Cambios" />
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        },
        data() {
            return {
                form: new Form({
                    name: '',
                    role:'',
                    email:'',
                    password: '',
                    confirm_password:''
                })
            };
        },
        methods: {
            formSubmit() {
                this.form.post('api/location/create')
                    .then(() => {
                        this.$toast.success({
                            title:'Lugar Guardado',
                            message:'Lugar guardado correctamente!!'
                        });
                        window.location = "/home";
                    })
                    .catch(() => {

                    })
            }
        }
    }
</script>

<style scoped>

</style>