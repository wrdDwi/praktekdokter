
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
import Vuex from 'vuex';
Vue.use(Vuex);
import App from './App.vue';
import VueAxios from 'vue-axios';
import axios from 'axios';
import example from './components/ExampleComponent.vue';
import Router from './router';
import myApi from './myApi';
import { library } from '@fortawesome/fontawesome-svg-core'
import { faUserSecret } from '@fortawesome/free-solid-svg-icons'
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'
import store from './store/index';

//import router from './router';
//Vue.component('App', require('./App.vue'));
Vue.use(BootstrapVue);
vue.use(myApi)
Vue.use(VueAxios, axios);
//Vue.use(baseUrl);
library.add(faUserSecret)

Vue.component('font-awesome-icon', FontAwesomeIcon)

Vue.config.productionTip = false
window.Laravel={
  "csrfToken": "foo",
  "baseUrl": "http:\/\/localhost:8080\/"
}
new Vue({
    el: '#app',
    store,
    router:Router,
    data:{
      baseUrl:Laravel.baseUrl
    },
    template: '<App/>',
    components: {
      App
    }
  
  })