require('./bootstrap');

window.Vue = require('vue');

import * as VueGoogleMaps from 'vue2-google-maps';
Vue.use(VueGoogleMaps, {
    load: {
        key: 'AIzaSyB0T-uGFTd8aQ_a7mZmhN0hX9F5dhVUeH4',
        libraries: 'places'
    }
});


Vue.component('example', require('./components/Example.vue').default);
Vue.component('event-location', require('./components/EventLocation.vue').default);
Vue.component('event-registration', require('./components/EventRegistration.vue').default);


const app = new Vue({
    el: "#app"
});
