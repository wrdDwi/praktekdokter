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
      <AppAside/> 
    </div>
    <AppFooter/>
  </div>
</template>

<script>
import nav from '../_nav'
import { Header, Sidebar, Aside as AppAside, Footer as AppFooter}  from '../components/'
export default {
  name: 'full',
  components: {
    Header,
   Sidebar,
   AppAside,
   nav,
   AppFooter
  },
  data () {
    return {
     nav: nav.items
    }
  },
  computed: {
    name () {
      return this.$route.name
    },
    list () {
      return this.$route.matched
    }
  }
}
</script>