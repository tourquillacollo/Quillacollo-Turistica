<template>
    <div class="container">
        <h1><i class="fa fa-calendar"></i> Nuevo Evento</h1>
        <hr>
        <div class="row m-y-2">
            <div class="col-lg-8 push-lg-4 personal-info">
                <form role="form"  @submit.prevent="formSubmit" enctype="multipart/form-data">
                    Los campos marcados con (*) son requeridos
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label form-control-label">Titulo (*) </label>
                        <div class="col-lg-9">
                            <input type="text" value="" v-model="form.title"
                                   name="title"
                                   class="form-control" :class="{ 'is-invalid': form.errors.has('title') }"/>
                            <has-error :form="form" field="title"></has-error>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label form-control-label">Tipo (*)</label>
                        <div class="col-lg-9">
                            <select  size="0" v-model="form.tipo"
                                     name="tipo"
                                     class="form-control" :class="{ 'is-invalid': form.errors.has('tipo') }">
                                <option value="">Selecionar Tipo</option>
                                <option value="Gastronomicos">Gastronómico</option>
                                <option value="Religiosos">Religioso</option>
                                <option value="Culturales">Cultural</option>
                            </select>
                            <has-error :form="form" field="tipo"></has-error>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label form-control-label">Fecha Inicio (*)</label>
                        <div class="col-lg-9">
                            <input  type="date" value="" v-model="form.fecha_ini"
                                   name="fecha_ini"
                                   class="form-control" :class="{ 'is-invalid': form.errors.has('fecha_ini') }"/>
                            <has-error :form="form" field="fecha_ini"></has-error>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label form-control-label">Fecha Fin (*)</label>
                        <div class="col-lg-9">
                            <input  type="date" value="" v-model="form.fecha_fin"
                                   name="fecha_fin"
                                   class="form-control" :class="{ 'is-invalid': form.errors.has('fecha_fin') }"/>
                            <has-error :form="form" field="fecha_fin"></has-error>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label form-control-label">Detalle (*)</label>
                        <div class="col-lg-9">
                            <!--<textarea  id="exampleFormControlTextarea1" rows="10" v-model="form.detalle"-->
                                      <!--name="detalle"-->
                                      <!--class="form-control rounded-0" :class="{ 'is-invalid': form.errors.has('detalle') }">-->

                            <!--</textarea>-->
                            <!--<has-error :form="form" field="detalle"></has-error>-->
                            <ckeditor :editor="editor" v-model="form.detalle" :config="editorConfig"></ckeditor>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label form-control-label">Ubicacion (*)</label>
                        <div class="col-lg-9">
                            <input type="text" value="" placeholder="Ubicacion" v-model="form.location"
                                   name="location"
                                   class="form-control" :class="{ 'is-invalist-events-componentlist-events-componentlist-events-componentlid': form.errors.has('location') }"/>
                            <has-error :form="form" field="location"></has-error>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label form-control-label">Imagen</label>
                        <div class="col-lg-9">
                            <input type="file" @change="previewFiles">
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
            this.idEvent = this.$route.path.split('/')[2];
            if(this.idEvent !== 'new') {
                this.getEventInformation(this.idEvent);
            }
            console.log('Component mounted.')
        },
        data() {
            return {
                form: new Form({
                    title: '',
                    tipo: '',
                    fecha_ini : '',
                    fecha_fin : '',
                    detalle:'',
                    location: '',
                    image:''
                }),
                idEvent:'',
                idlocation : '',
                editor: ClassicEditor,
                editorConfig: {
                toolbar: [ 'heading', '|', 'bold', 'italic', 'link'
                                , 'bulletedList', 'numberedList', 'blockQuote'
                                ,  'alignment', 'undo', 'redo', 
                                'alignment:left', 'alignment:right', 'alignment:center', 'alignment:justify'
                                ]
                 },
                files: []
            };
        },
        methods: {
            formSubmit() {
                if(this.idEvent === 'new') {
                    this.form.post('../api/events/create')
                        .then(() => {
                            this.$toast.success({
                                title:'Evento guardado',
                                message:'Evento guardado correctamente!!'
                            });
                            window.location = "/events";
                        })
                        .catch(() => {

                        });
                } else {
                    this.form.put('../api/events/update/' + this.idEvent)
                        .then(() => {
                            this.$toast.success({
                                title:'Lugar Actualizado',
                                message:'Lugar Actualizado correctamente!!'
                            });
                            window.location = "/events";
                        })
                        .catch(() => {

                        });
                }
            },
            getEventInformation(idEvent) {
                this.axios.get(`../api/events/show/${idEvent}`)
                    .then((data) => {
                        this.form.fill({
                            title: data.data.event.titulo,
                            tipo: data.data.event.tipo,
                            fecha_ini : data.data.event.fecha_ini,
                            fecha_fin : data.data.event.fecha_fin,
                            detalle: data.data.event.detalle,
                            location: data.data.event.location
                        });
                    })
                    .catch(e => {
                        this.$toast.error({
                            title:'Error servicio',
                            message:'El servicio para los lugares no sirve!!'
                        });
                    });
            },
            previewFiles(event) {
                this.files = event.target.files;
                console.log(event.target.files);

            },
            saveEventImage(idEvent) {
                for(let i = 0; i < this.files.length; i++) {
                    let formData = new FormData();
                    formData.append('file', this.files[i]);
                    formData.append('idLocation', idEvent);
                    this.axios.post(`../api/location/files/upload-file`,
                        formData,
                        {
                            headers: {
                                'Content-Type': 'multipart/form-data'
                            }
                        }
                    ).then(function(data) {
                        this.$toast.success({
                            title:'Correcto',
                            message:'Imagen cargada correctamente.'
                        });
                    }.bind(this)).catch(function(data) {
                        this.$toast.error({
                            title:'Error servicio',
                            message:'No se pudo optener el nombre del del lugar!!'
                        });
                    });
                }
            }
        }
    }
</script>

<style scoped>

</style>