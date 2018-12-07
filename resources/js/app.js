
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
Vue.use(VueRouter)

import VueAxios from 'vue-axios'
import axios from 'axios'
Vue.use(VueAxios, axios)

window.Form = Form;
Vue.component(HasError.name, HasError)
Vue.component(AlertError.name, AlertError)

Vue.component('list-location-component', require('./components/ListLocations.vue'));
Vue.component('edit-location-component', require('./components/EditLocation.vue'));
Vue.component('load-gallery-component', require('./components/LoadGalleryLocation.vue'));
Vue.component('list-locationfront-component', require('./components/ListLocationFront.vue'));
Vue.component('detail-location-component', require('./components/LocationDetail.vue'));


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
