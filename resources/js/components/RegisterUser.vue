<template>
    <div class="container">
        <h1><i class="fa fa-user"></i> Nuevo Usuario</h1>
        <hr>
        <div class="row m-y-2">
            <div class="col-lg-8 push-lg-4 personal-info">
                <form role="form"  @submit.prevent="formSubmit" enctype="multipart/form-data">
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label form-control-label">Nombre (*)</label>
                        <div class="col-lg-9">
                            <input type="text" value="" v-model="form.name"
                                   name="name"
                                   class="form-control" :class="{ 'is-invalid': form.errors.has('name') }"/>
                            <has-error :form="form" field="name"></has-error>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label form-control-label">Cargo (*)</label>
                        <div class="col-lg-9">
                            <select  size="0" v-model="form.role"
                                     name="role"
                                     class="form-control" :class="{ 'is-invalid': form.errors.has('role') }">
                                <option value="">Selecionar Tipo</option>
                                <option value="Usuario">Usuario</option>
                                <!--<option value="2">Director</option>-->
                                <option value="Administrador">Administrador</option>
                            </select>
                            <has-error :form="form" field="role"></has-error>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label form-control-label">Email (*)</label>
                        <div class="col-lg-9">
                            <input type="text" value="" v-model="form.email"
                                   name="email"
                                   class="form-control" :class="{ 'is-invalid': form.errors.has('email') }"/>
                            <has-error :form="form" field="email"></has-error>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label form-control-label">Password (*)</label>
                        <div class="col-lg-9">
                            <input type="password" value="" placeholder="Password" v-model="form.password"
                                   name="password"
                                   class="form-control" :class="{ 'is-invalid': form.errors.has('password') }"/>
                            <has-error :form="form" field="password"></has-error>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label form-control-label">Confirmar Password (*)</label>
                        <div class="col-lg-9">
                            <input type="password" value="" placeholder="Confirmar Password" v-model="form.confirm_password"
                                   name="confirm_password"
                                   class="form-control" :class="{ 'is-invalid': form.errors.has('confirm_password') }"/>
                            <has-error :form="form" field="confirm_password"></has-error>
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
            this.idUser = this.$route.path.split('/')[2];
            if(this.idUser !== 'new') {
                this.getUserInformation(this.idUser);
            }
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
                if(this.idUser === 'new') {
                    this.form.post('../api/users/create')
                        .then(() => {
                            this.$toast.success({
                                title:'Lugar Guardado',
                                message:'Lugar guardado correctamente!!'
                            });
                            window.location = "/users";
                        })
                        .catch(() => {

                        })
                } else {
                    this.form.post(`../api/users/update/${this.idUser}`)
                        .then(() => {
                            this.$toast.success({
                                title:'Lugar Guardado',
                                message:'Lugar guardado correctamente!!'
                            });
                            window.location = "/users";
                        })
                        .catch(() => {

                        })
                }

            },
            getUserInformation(idUser) {
                this.axios.get(`../api/users/show/${idUser}`)
                    .then((data) => {
                        const user = data.data.users[0];
                        this.form.fill({
                            name: user.name,
                            role: user.role,
                            email:user.email,
                            password: '',
                            confirm_password:''
                        });
                    })
                    .catch(e => {
                        this.$toast.error({
                            title:'Error servicio',
                            message:'El servicio para los lugares no sirve!!'
                        });
                    });
            }
        }
    }
</script>

<style scoped>

</style>