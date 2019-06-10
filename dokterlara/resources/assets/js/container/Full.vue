<template>
  <div class="app">
    <Header/>
    <div class="app-body">
    <Sidebar :navItems="nav"/>
      <main class="main">
        <!-- <breadcrumb :list="list"/> -->
        <div class="container-fluid">
          <router-view></router-view>
        </div>
      </main>
      <!-- <AppAside/> --> 
    </div>
    <!-- <AppFooter/> -->
  </div>
</template>

<script>
//import nav from '../_nav'
import { Header, Sidebar }  from '../components/'
export default {
  name: 'full',
  components: {
    Header,
   
  },
  data () {
    return {
    //  nav: nav.items
    }
  },
  computed: {
    name () {
      return this.$route.name
    },
    list () {
     // return this.$route.matched
    }
  }
}
</script>