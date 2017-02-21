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
        text: '首页',
        url: '/',
        icon: 'icon-home'
      }, {
        text: '用户管理',
        url: '/user/count',
        icon: 'icon-fenzu',
        sub: [{
          text: '统计',
          url: '/user/count',
          icon: ''
        }, {
          text: '分类',
          url: '/user/catory',
          icon: ''
        }, {
          text: '列表',
          url: '/user/list',
          icon: ''
        }]
      }, {
        text: '数据库',
        url: '/database/list',
        icon: 'icon-database',
        sub: [{
          text: '数据库配置',
          url: '/database/setting',
          icon: ''
        }, {
          text: '数据库列表',
          url: '/database/list',
          icon: ''
        }, {
          text: '新增数据库',
          url: '/database/add',
          icon: ''
        }, {
          text: '列表',
          url: '/database/list',
          icon: ''
        }]
      }]
    }
  }
}
</script>

<style>

</style>
