<template>
    <div class="container">
        <h1><i class="fas fa-image"></i> Galeria para:{{ location.nombre }}</h1>
        <hr>
        <div class="row justify-content-center">
            <div class="col w-100">
                <div class="card">
                    <div class="card-header">Imagenes
                        <!--<div class="float-right">-->
                            <!--<button type="button" class="btn btn-primary" v-on:click="onClickNewLocation()">-->
                                <!--<i class="fas fa-plus"></i> Nueva imagen-->
                            <!--</button>-->
                        <!--</div>-->
                    </div>

                    <div class="card-body">
                        <div class="large-12 medium-12 small-12 filezone">
                            <input type="file" id="files" ref="files" multiple v-on:change="handleFiles()"/>
                            <p>
                                Arrasta la imagen que quieres cargar <br>o  click aqui.
                            </p>
                        </div>

                        <!--<div v-for="(file, key) in files" class="file-listing">-->
                            <!--<img class="preview" v-bind:ref="'preview'+parseInt(key)"/>-->
                            <!--{{ file.name }}-->
                            <!--<div class="success-container" v-if="file.id > 0">-->
                                <!--Completo-->
                            <!--</div>-->
                            <!--<div class="remove-container" v-else>-->
                                <!--<a class="remove" v-on:click="removeFile(key)">Eliminar</a>-->
                            <!--</div>-->
                        <!--</div>-->
                        <br>
                        <div class="float-right">
                            <a v-on:click="submitFiles()" v-show="files.length > 0" style="cursor:pointer;color:blue;" title="Guardar imagenes">
                                <i class="fas fa-save"></i>  
                                Guardar Imagenes
                            </a>
                        </div>    
                        <br>

                        <table class="table table-hover">
                            <th>Imagen</th>
                            <th>Creado</th>
                            <th>Acciones</th>
                            <tr v-for="(file, key) in files" :key="file.id">
                                <td>
                                    <div v-if="file.ruta_imagen">
                                        <img class="preview" :src="getImagePath(file.ruta_imagen)" width="100" height="100"/>
                                    </div>
                                    <div v-else>
                                        <img class="preview" v-bind:ref="'preview'+parseInt(key)" width="100" height="100"/>
                                        {{ file.name }}
                                    </div>

                                </td>
                                <td>{{file.created_at}}</td>
                                <td>
                                    <div class="success-container" v-if="file.id > 0">
                                        <a v-on:click="onClickDelete(file.id)" style="cursor:pointer;color:red;"><i class="fas fa-times"></i> Eliminar</a>
                                    </div>
                                    <div class="remove-container" v-else>
                                        <a v-on:click="removeFile(key)" style="cursor:pointer;color:red;"><i class="fas fa-times"></i> Eliminar</a>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            const idLocation = this.$route.path.split('/')[2];
            this.axios.get(`../api/location/${idLocation}`)
                .then((data) => {
                    this.location = data.data.location;

                })
                .catch(e => {
                    this.$toast.error({
                        title:'Error servicio',
                        message:'No se pudo optener el nombre del del lugar!!'
                    });
                });
            this.axios.get(`../api/location/files/${idLocation}`)
                .then(data => {
                    this.files = data.data.images;
                })
                .catch(e => {
                    this.$toast.error({
                        title:'Error servicio',
                        message:'No se pudo optener el nombre del del lugar!!'
                    });
                });
        },
        data() {
            return {
                location:{},
                files: []
            };
        },
        methods: {
            getImagePath(image) {
                return '../uploads/lugares/' + image;
            },
            handleFiles() {
                let uploadedFiles = this.$refs.files.files;

                for(let i = 0; i < uploadedFiles.length; i++) {
                    this.files.push(uploadedFiles[i]);
                }
                this.getImagePreviews();
            },
            getImagePreviews(){
                for( let i = 0; i < this.files.length; i++ ){
                    if ( /\.(jpe?g|png|gif)$/i.test( this.files[i].name ) ) {
                        let reader = new FileReader();
                        reader.addEventListener("load", function(){
                            this.$refs['preview'+parseInt(i)][0].src = reader.result;
                        }.bind(this), false);
                        reader.readAsDataURL( this.files[i] );
                    }else{
                        this.$nextTick(function(){
                            this.$refs['preview'+parseInt(i)][0].src = '/images/generic.png';
                        });
                    }
                }
            },
            removeFile( key ){
                this.files.splice( key, 1 );
                this.getImagePreviews();
            },
            submitFiles() {

                for( let i = 0; i < this.files.length; i++ ){
                    if(this.files[i].id) {
                        continue;
                    }
                    let formData = new FormData();
                    formData.append('file', this.files[i]);
                    formData.append('idLocation', this.location.id);

                    this.axios.post(`../api/location/files/upload-file`,
                        formData,
                        {
                            headers: {
                                'Content-Type': 'multipart/form-data'
                            }
                        }
                    ).then(function(data) {
                        this.files[i].id = data['data']['id'];
                        this.files.splice(i, 1, this.files[i]);
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
            },
            onClickDelete(idFile) {
                let uri = `../api/files/delete/${idFile}`;
                this.axios.delete(uri)
                    .then(data => {
                        this.files.splice(this.files.indexOf(idFile), 1);
                        this.$toast.success({
                            title:'Correcto',
                            message:'Imagen eliminada correctamente.'
                        });
                    })
                    .catch(e =>{
                        this.$toast.error({
                            title:'Error servicio',
                            message:'No se pudo eliminar el archivo!!'
                        });
                    })
            }
        }
    }
</script>

<style scoped>
    input[type="file"]{
        opacity: 0;
        width: 100%;
        height: 200px;
        position: absolute;
        cursor: pointer;
    }
    .filezone {
        outline: 2px dashed grey;
        outline-offset: -10px;
        background: #ccc;
        color: dimgray;
        padding: 10px 10px;
        min-height: 200px;
        position: relative;
        cursor: pointer;
    }
    .filezone:hover {
        background: #c0c0c0;
    }

    .filezone p {
        font-size: 1.2em;
        text-align: center;
        padding: 50px 50px 50px 50px;
    }
    div.file-listing img{
        max-width: 90%;
    }

    div.file-listing{
        margin: auto;
        padding: 10px;
        border-bottom: 1px solid #ddd;
    }

    div.file-listing img{
        height: 100px;
    }
    div.success-container{
        text-align: center;
        color: green;
    }

    div.remove-container{
        text-align: center;
    }

    div.remove-container a{
        color: red;
        cursor: pointer;
    }

    a.submit-button{
        display: block;
        margin: auto;
        text-align: center;
        width: 200px;
        padding: 10px;
        text-transform: uppercase;
        background-color: #CCC;
        color: white;
        font-weight: bold;
        margin-top: 20px;
        cursor: pointer;
    }
</style>
