<template>
    <div class="container">
        <h1><i class="fa fa-map-marker"></i></i> Nuevo Servicio</h1>
        <hr>
        <div class="row m-y-2">
            <div class="col-lg-8 push-lg-4 personal-info">
                <form role="form"  @submit.prevent="formSubmit" enctype="multipart/form-data">
                    Los campos marcados con (*) son requeridos
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label form-control-label">Titulo (*) </label>
                        <div class="col-lg-9">
                            <input  type="text" value=""
                                   v-model="form.service_name" name="service_name"
                                    class="form-control" :class="{ 'is-invalid': form.errors.has('service_name') }"/>
                            <has-error :form="form" field="service_name"></has-error>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label form-control-label">Tipo (*)</label>
                        <div class="col-lg-9">
                            <select size="0" v-model="form.type" name="type"
                                    class="form-control" :class="{ 'is-invalid': form.errors.has('type') }">
                                <option value="">Selecconar Tipo</option>
                                <option value="Restaurantes">Restaurantes</option>
                                <option value="Hoteles">Hoteles</option>
                            </select>
                            <has-error :form="form" field="type"></has-error>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label form-control-label">Telefono</label>
                        <div class="col-lg-9">
                            <input class="form-control"  type="text" value="" v-model="form.telephone"/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label form-control-label">Direccion (*)</label>
                        <div class="col-lg-9">
                            <input type="text" value="" placeholder="Ubicacion" v-model="form.address"
                                   name="address"
                                   class="form-control" :class="{ 'is-invalid': form.errors.has('address') }"/>
                            <has-error :form="form" field="address"></has-error>
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
            this.idService = this.$route.path.split('/')[2];
            if(this.idService !== 'new') {
                this.getServiceInformation(this.idService);
            }
            console.log('Component mounted.')
        },
        data() {
            return {
                form: new Form({
                    service_name: '',
                    type: '',
                    detail : '',
                    address : '',
                    telephone:''
                }),
                idService:''
            };
        },
        methods: {
            formSubmit() {
                if(this.idService === 'new') {
                    this.form.post('../api/services')
                        .then(() => {
                            this.$toast.success({
                                title:'Service guardado',
                                message:'Service guardado correctamente!!'
                            });
                            window.location = "/services";
                        })
                        .catch(() => {

                        });
                } else {
                    this.form.put('../api/services/' + this.idService)
                        .then(() => {
                            this.$toast.success({
                                title:'Service Actualizado',
                                message:'Service Actualizado correctamente!!'
                            });
                            window.location = "/services";
                        })
                        .catch(() => {

                        });
                }
            },
            getServiceInformation(idService) {
                this.axios.get(`../api/services/${idService}`)
                    .then((data) => {
                        this.form.fill({
                            service_name: data.data.service.service_name,
                            type: data.data.service.type,
                            address : data.data.service.address,
                            telephone : data.data.service.telephone
                        });
                    })
                    .catch(e => {
                        this.$toast.error({
                            title:'Error servicio',
                            message:'El servicio para los servicios!!'
                        });
                    });
            }
        }
    }
</script>

<style scoped>

</style>