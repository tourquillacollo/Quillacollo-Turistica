<template>
    <div class="container">
        <div class="row m-y-2">
            <!-- edit form column -->
            <!--<div class="col-lg-4 text-lg-center">-->
                <!--<h2>Edit Profile</h2>-->
            <!--</div>-->
            <!--<div class="col-lg-8">-->
                <!--<div class="alert alert-info alert-dismissable"> <a class="panel-close close" data-dismiss="alert">×</a>-->
                    <!--This is an <strong>.alert</strong>. Use this to show important messages to the user.-->
                <!--</div>-->
            <!--</div>-->
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
                                <option value="Turistico">Circuito Turistico</option>
                                <option value="Arquitectonico">Circuito Arquitectonico</option>
                                <option value="Arqueologico">Circuito Arqueologico</option>
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
                    <!--<div class="form-group row">-->
                        <!--<label class="col-lg-3 col-form-label form-control-label">Refencia</label>-->
                        <!--<div class="col-lg-9">-->
                            <!--<input class="form-control" type="text" value="" />-->
                        <!--</div>-->
                    <!--</div>-->
                    <!--<div class="form-group row">-->
                        <!--<label class="col-lg-3 col-form-label form-control-label">Pagina Web</label>-->
                        <!--<div class="col-lg-9">-->
                            <!--<input class="form-control" type="url" value="" />-->
                        <!--</div>-->
                    <!--</div>-->
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
            <!--<div class="col-lg-4 pull-lg-8 text-xs-center">-->
                <!--<img src="//placehold.it/150" class="m-x-auto img-fluid img-circle" alt="avatar" />-->
                <!--<h6 class="m-t-2">Cargar diferentes fotos</h6>-->
                <!--<label class="custom-file">-->
                    <!--<input type="file" id="file" class="custom-file-input">-->
                    <!--<span class="custom-file-control">Seleccionar Foto</span>-->
                <!--</label>-->
            <!--</div>-->
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
                    title: '',
                    type_circuito:'',
                    datos_referencia:'',
                    ubicacion: ''
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
