
require('./bootstrap');

window.Vue = require('vue');


Vue.component('list-location-component', require('./components/ListLocations.vue'));


const app = new Vue({
    el: '#app'
});
