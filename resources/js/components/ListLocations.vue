<template>
    <div>
        <div class="row">
            <div class="col">
                <div class="float-right">
                    <button type="button" class="btn btn-primary">Registrar Lugar</button>
                </div>
            </div>
        </div>
        <div class="row">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th scope="col">Nombre</th>
                    <th scope="col">Tipo</th>
                    <th scope="col">Acciones</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>Mark</td>
                    <td>
                        <button type="button" class="btn btn-danger" v-on:click="onClickDelete()">Eliminar</button>
                        <button type="button" class="btn btn-primary" v-on:click="onClickDetail()">Detallar</button>
                    </td>
                </tr>
                </tbody>
            </table>
        </div><!--/row-->
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        },
        methods: {
            onClickDelete() {
                console.log('Eliminando...');
            },
            onClickDetail() {
                console.log('Detallar ...');
            }
        }
    }
</script>
