<template>
  <div id="app" class="app">
    <app-header :logo="logo" :nav="nav" :user="user"></app-header>
    <app-aside :menu="menu"></app-aside>
    <router-view class="main"></router-view>
  </div>
</template>

<script>
import Header from 'views/header'
import Aside from 'views/aside'
import config from './config/index.js'
export default {
  name: 'app',
  components: {
    'app-header': Header,
    'app-aside': Aside
  },
  data () {
    return {
      logo: config.logo,
      user: config.user,
      menu: config.menu,
      nav: config.nav
    }
  }
}
</script>

<style>

</style>
