
require('./bootstrap');

window.Vue = require('vue');
import { Form, HasError, AlertError } from 'vform'
import CxltToastr from 'cxlt-vue2-toastr'


Vue.use(CxltToastr)
var toastrConfigs = {
    position: 'top right',
    showDuration: 2000
}
Vue.use(CxltToastr, toastrConfigs)

import VueRouter from 'vue-router'
Vue.use(VueRouter);

import VueAxios from 'vue-axios'
import axios from 'axios'
Vue.use(VueAxios, axios);

import CKEditor from '@ckeditor/ckeditor5-vue';
import ClassicEditor from '@ckeditor/ckeditor5-build-classic';
Vue.use( CKEditor, ClassicEditor );

window.Form = Form;
Vue.component(HasError.name, HasError);
Vue.component(AlertError.name, AlertError);

Vue.component('list-location-component', require('./components/ListLocations.vue'));
Vue.component('edit-location-component', require('./components/EditLocation.vue'));
Vue.component('load-gallery-component', require('./components/LoadGalleryLocation.vue'));
Vue.component('list-locationfront-component', require('./components/ListLocationFront.vue'));
Vue.component('detail-location-component', require('./components/LocationDetail.vue'));
Vue.component('list-users-component', require('./components/ListUsers.vue'));
Vue.component('register-user-component', require('./components/RegisterUser.vue'));
Vue.component('list-events-component', require('./components/ListEvent.vue'));
Vue.component('edit-events-component', require('./components/EditEvent.vue'));
Vue.component('list-circuitoturistico-component', require('./components/ListCircuitoTuristico.vue'));
Vue.component('list-circuitoreligioso-component', require('./components/ListReligiosoTuristico.vue'));
Vue.component('list-circuitoarqueologico-component', require('./components/ListArqueTuristico.vue'));
Vue.component('list-circuitoecologico-component', require('./components/ListEcologico.vue'));
Vue.component('list-eventos-component', require('./components/ListEventsFront.vue'));
Vue.component('list-eventreligioso-component', require('./components/ListEventReligioso.vue'));
Vue.component('list-eventgastronomico-component', require('./components/ListEventGastronomico.vue'));
Vue.component('list-eventculturales-component', require('./components/ListEventCulturales.vue'));
Vue.component('list-services-component', require('./components/ListServices.vue'));
Vue.component('edit-service-component', require('./components/EditService.vue'));
Vue.component('list-hoteles-component', require('./components/ListHotelService.vue'));
Vue.component('list-restaurantes-component', require('./components/ListRestaurantService.vue'));
Vue.component('list-showlocation-component', require('./components/ShowLocation.vue'));






let routes = [
    // { path: '/developer', component: require('./components/Developer.vue') },
    // { path: '/users', component: require('./components/Users.vue') },
    // { path: '/profile', component: require('./components/Profile.vue') },
    // { path: '*', component: require('./components/NotFound.vue') }
]

const router = new VueRouter({
    mode: 'history',
    routes // short for `routes: routes`
})



const app = new Vue({
    el: '#app',
    router
});



