<template>
    <div class="container">
        <h1><i class="fa fa-map"></i> Nuevo Lugar</h1>
        <hr>
        <div class="row m-y-2">
            <div class="col-lg-8 push-lg-4 personal-info">
                <form role="form"  @submit.prevent="formSubmit" enctype="multipart/form-data">
                    Los campos marcados con (*) son requeridos
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label form-control-label">Titulo (*)</label>
                        <div class="col-lg-9">
                            <input  type="text" value="" v-model="form.title"
                                    name="title"
                                    class="form-control" :class="{ 'is-invalid': form.errors.has('title') }"/>
                            <has-error :form="form" field="title"></has-error>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label form-control-label">Tipo de Circuito (*)</label>
                        <div class="col-lg-9">
                            <select  size="0" v-model="form.type_circuito"
                                     name="type_circuito"
                                     class="form-control" :class="{ 'is-invalid': form.errors.has('type_circuito')}">
                                <option value="">Seleccione Tipo</option>
                                <option value="Historico">Circuito Histórico</option>
                                <option value="Religioso">Circuito Religioso</option>
                                <option value="Arqueologico">Circuito Arqueológico</option>
                                <option value="Ecologico">Circuito Ecológico</option>
                            </select>
                            <has-error :form="form" field="type_circuito"></has-error>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label form-control-label">Datos Referencia (*)</label>
                        <div class="col-lg-9">
                            <!--<textarea id="exampleFormControlTextarea1" rows="10" v-model="form.datos_referencia"-->
                                      <!--name="datos_referencia"-->
                                      <!--class="form-control rounded-0" :class="{ 'is-invalid': form.errors.has('datos_referencia')}">-->

                            <!--</textarea>-->
                            <!--<has-error :form="form" field="datos_referencia"></has-error>-->
                            <ckeditor :editor="editor" v-model="form.datos_referencia" :config="editorConfig"></ckeditor>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label form-control-label">Ubicacion</label>
                        <div class="col-lg-9">
                            <input type="text" value="" placeholder="Ubicacion" v-model="form.ubicacion"
                                   name="ubicacion"
                                   class="form-control rounded-0" :class="{ 'is-invalid': form.errors.has('ubicacion')}"/>
                            <has-error :form="form" field="ubicacion"></has-error>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label form-control-label">Latitud</label>
                        <div class="col-lg-9">
                            <input type="text" value="" placeholder="Latitud" v-model="form.latitude"
                                   name="latitude"
                                   class="form-control rounded-0" :class="{ 'is-invalid': form.errors.has('latitude')}"/>
                            <has-error :form="form" field="latitude"></has-error>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label form-control-label">Longitud</label>
                        <div class="col-lg-9">
                            <input type="text" value="" placeholder="Longitude" v-model="form.longitude"
                                   name="longitude"
                                   class="form-control rounded-0" :class="{ 'is-invalid': form.errors.has('longitude')}"/>
                            <has-error :form="form" field="longitude"></has-error>
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

    import ClassicEditor from '@ckeditor/ckeditor5-build-classic';
    export default {
        mounted() {
            this.idLocation = this.$route.path.split('/')[2];
            if(this.idLocation !== 'new') {
                this.getLocationInformation(this.idLocation);
            }

        }
        ,data() {
            return {
                form: new Form({
                    title: '',
                    type_circuito:'',
                    datos_referencia:'',
                    ubicacion: '',
                    latitude: 0.1,
                    longitude: 0.1,
                }),
                idlocation : '',
                editor: ClassicEditor,
                editorConfig: {
                    // The configuration of the editor.
                }
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
                            ubicacion:data.data.location.ubicacion,
                            latitude: data.data.location.latitud,
                            longitude: data.data.location.latitud
                        });
                    })
                    .catch(e => {
                        this.$toast.error({
                            title:'Error servicio',
                            message:'El servicio para los lugares no sirve!!'
                        });
                    });
            },
            onBlur(evt) {
                console.log(evt);
            },
            onFocus(evt) {
                console.log(evt);
            },
            onContentDom(evt) {
                console.log(evt);
            },
            onDialogDefinition(evt) {
                console.log(evt);
            },
            onFileUploadRequest(evt) {
                console.log(evt);
            },
            onFileUploadResponse(evt) {
                console.log(evt);
            }

        }
    }
</script>
