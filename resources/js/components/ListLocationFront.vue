<template>
    <div class="w-100">

        <h2>Lista de lugares </h2>
        <hr>
        <div class="col" v-for="location in locations">
            <div class="card h-100">
                <h4 class="card-header">
                    {{ location.nombre }} /
                    {{ location.created_at }}
                </h4>
                <div class="card-body">
                    <table>
                        <tr>
                            <td>
                                <img src="../../assets/images/location_default.jpg" height="150" width="150"/>
                            </td>
                            <td>
                                <p class="card-text">
                                    {{ location.datos_referencia }}
                                </p>
                                <a href="#" v-on:click="detailLocation(location.id)" class="btn btn-primary">Saber Mas</a>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "ListLocationFront",
        mounted() {
            this.axios.get('api/location/list')
                .then(response =>{
                    this.locations = response.data.data;
                })
        },
        data() {
            return {
                locations: []
            }
        },
        methods: {
            detailLocation(idLocation) {
                window.location='/locationdetail/' + idLocation;
            }
        }
    }
</script>

<style scoped>

</style>