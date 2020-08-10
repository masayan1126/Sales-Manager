require('./bootstrap');
require('./chart');

window.Vue = require('vue');

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

const app = new Vue({
    el: '#app'
});

// window.Vue = require('vue');
// import Vue from 'vue'
// import ExampleComponent from './components/ExampleComponent.vue'

// Vue.component('example-component', require('./components/ExampleComponent.vue').default);
// Vue.component('chart', require('./components/Chart.vue'));
// Vue.component('header-component', require('./components/HeaderComponent.vue').default);

// const app = new Vue({
//     el: '#app'
// });

// var app = new Vue({
//     el: '#app',
//     components: {
//         ExampleComponent,
//       }
// });