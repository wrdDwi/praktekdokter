import Vue from 'vue';
import Router from 'vue-router';
import Full from '../container/Full';
import obat from '../pages/obat/listObat'

Vue.use(Router)

export default new Router({
  //  mode: 'hash', // Demo is living in GitHub.io, so required!
    // linkActiveClass: 'open active',
    // scrollBehavior: () => ({ y: 0 }),
    mode:'history',
    routes: [
        {
            path: '/',
           
            name: 'Home',
            component: Full,
            
        },
        {
          path:'obat',
          name:'Obat',
          Component : obat,
        }
    ]})