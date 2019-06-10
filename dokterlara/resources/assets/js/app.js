
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

import Vue from 'vue';
import BootstrapVue from 'bootstrap-vue';
import VueRouter from 'vue-router';
Vue.use(VueRouter);
import App from './App.vue';
import VueAxios from 'vue-axios';
import axios from 'axios';
import example from './components/ExampleComponent.vue';
import Router from './router';
//import router from './router';
//Vue.component('App', require('./App.vue'));
Vue.use(BootstrapVue);

Vue.use(VueAxios, axios);


new Vue({
    el: '#app',
    router:Router,
    template: '<App/>',
    components: {
      example
    },
    render: h => h(App)
  })