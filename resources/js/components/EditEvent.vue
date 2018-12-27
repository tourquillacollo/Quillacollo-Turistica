<template>
    <div class="container">
        <h1><i class="fa fa-map-marker"></i></i> Nuevo Evento</h1>
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
                        <label class="col-lg-3 col-form-label form-control-label">Tipo</label>
                        <div class="col-lg-9">
                            <select  class="form-control" size="0" v-model="form.tipo">
                                <option value="Gastronomicos">Gastronomico</option>
                                <option value="Religiosos">Religioso</option>
                                <option value="Culturales">Cultural</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label form-control-label">Fecha Inicio</label>
                        <div class="col-lg-9">
                            <input class="form-control"  type="date" value="" v-model="form.fecha_ini"/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label form-control-label">Fechar Fin</label>
                        <div class="col-lg-9">
                            <input class="form-control"  type="date" value="" v-model="form.fecha_fin"/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label form-control-label">Detalle</label>
                        <div class="col-lg-9">
                            <textarea class="form-control rounded-0" id="exampleFormControlTextarea1" rows="10" v-model="form.detalle">

                            </textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label form-control-label">Ubicacion</label>
                        <div class="col-lg-9">
                            <input class="form-control" type="text" value="" placeholder="Ubicacion" v-model="form.location"/>
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
                    location: ''
                }),
                idEvent:''
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
                            this.$toast.error({
                                title:'Error',
                                message:'Ocurrio un erro en al guardar el evento!'
                            });
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
            }
        }
    }
</script>

<style scoped>

</style>