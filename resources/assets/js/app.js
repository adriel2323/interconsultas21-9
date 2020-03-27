require('./bootstrap');

window.Vue = require('vue');

/**
 * General Components
 */
Vue.component('modal', require('./components/Modal.vue'));

/**
 * PathologicalAnatomy Components
 */
Vue.component('pa-billing-codes', require('./components/Modules/PathologicalAnatomy/BillingCodes.vue'));

const app = new Vue({
    el: '#app'
});
