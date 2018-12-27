<template>
    <div class="container">
        <h1><i class="fa fa-map"></i> Nuevo Lugar</h1>
        <hr>
        <div class="row m-y-2">
            <div class="col-lg-8 push-lg-4 personal-info">
                <form role="form"  @submit.prevent="formSubmit" enctype="multipart/form-data">
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label form-control-label">Titulo</label>
                        <div class="col-lg-9">
                            <input class="form-control"  type="text" value="" v-model="form.title"/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label form-control-label">Tipo de Circuito</label>
                        <div class="col-lg-9">
                            <select  class="form-control" size="0" v-model="form.type_circuito">
                                <option value="Historico" selected="selected">Circuito Historico</option>
                                <option value="Religioso">Circuito Religioso</option>
                                <option value="Arqueologico">Circuito Arqueologico</option>
                                <option value="Ecologico">Circuito Ecologico</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label form-control-label">Datos Referencia</label>
                        <div class="col-lg-9">
                            <textarea class="form-control rounded-0" id="exampleFormControlTextarea1" rows="10" v-model="form.datos_referencia">

                            </textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label form-control-label">Ubicacion</label>
                        <div class="col-lg-9">
                            <input class="form-control" type="text" value="" placeholder="Ubicacion" v-model="form.ubicacion"/>
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
            this.idLocation = this.$route.path.split('/')[2];
            if(this.idLocation !== 'new') {
                this.getLocationInformation(this.idLocation);
            }

        },
        data() {
            return {
                form: new Form({
                    title: '',
                    type_circuito:'',
                    datos_referencia:'',
                    ubicacion: ''
                }),
                idlocation : ''
            };
        },
        methods: {
            formSubmit() {
                if(this.idLocation === 'new') {
                    this.form.post('../api/location/create')
                        .then(() => {
                            this.$toast.success({
                                title:'Lugar Guardado',
                                message:'Lugar guardado correctamente!!'
                            });
                            window.location = "/home";
                        })
                        .catch(() => {

                        });
                } else {
                    this.form.put('../api/location/update/' + this.idLocation)
                        .then(() => {
                            this.$toast.success({
                                title:'Lugar Actualizado',
                                message:'Lugar Actualizado correctamente!!'
                            });
                            window.location = "/home";
                        })
                        .catch(() => {

                        });
                }

            },
            getLocationInformation(idLocation) {
                this.axios.get(`../api/location/${idLocation}`)
                    .then((data) => {
                        this.form.fill({
                            title: data.data.location.nombre,
                            type_circuito: data.data.location.type,
                            datos_referencia:data.data.location.datos_referencia,
                            ubicacion:data.data.location.ubicacion
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
