<template>
  <div id="app">
    <app-header :logo="logo" :nav="nav" :user="user"></app-header>
    <router-view></router-view>
  </div>
</template>

<script>
import Header from 'views/header'
export default {
  name: 'app',
  data () {
    return {
      logo: '这是logo',
      user: 'admin',
      nav: [{
        icon: 'icon-password',
        text: '修改密码',
        url: '/edit_password'
      }, {
        icon: 'icon-logout',
        text: '退出登录',
        url: '/logout'
      }]
    }
  },
  components: {
    'app-header': Header
  }
}
</script>

<style>
</style>
