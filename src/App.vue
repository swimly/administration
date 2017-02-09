<template>
  <div id="app">
    <app-header :logo="logo" :nav="nav" :user="user"></app-header>
    <app-aside :menu="menu"></app-aside>
    <router-view></router-view>
  </div>
</template>

<script>
import Header from 'views/header'
import Aside from 'views/aside'
export default {
  name: 'app',
  components: {
    'app-header': Header,
    'app-aside': Aside
  },
  data () {
    return {
      logo: '这是logo',
      user: 'admin',
      nav: [{
        icon: 'icon-password',
        text: '修改密码',
        url: '/home/editPassword'
      }, {
        icon: 'icon-logout',
        text: '退出登录',
        url: '/logout'
      }],
      menu: [{
        text: '用户管理',
        url: '/user',
        sub: [{
          text: '添加',
          url: '/user/add'
        }, {
          text: '删除',
          url: '/user/del'
        }]
      }]
    }
  }
}
</script>

<style>
</style>
