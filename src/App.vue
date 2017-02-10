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
        url: '/'
      }, {
        text: '用户管理',
        url: '',
        sub: [{
          text: '统计',
          url: '/user/count'
        }, {
          text: '分类',
          url: '/user/catory'
        }, {
          text: '列表',
          url: '/user/list'
        }]
      }, {
        text: '项目管理',
        url: '',
        sub: [{
          text: '分类',
          url: '/project/catory'
        }, {
          text: '统计',
          url: '/project/count'
        }, {
          text: '列表',
          url: '/project/list'
        }]
      }]
    }
  }
}
</script>

<style>
html{font-size:62.5%;}
html,body{height:100%;margin:0;font-family:"Microsoft YaHei"}
h1,h2,h3,h4,h5,h6,p{margin:0;}
ul,li,dt,dl,dd{padding:0;margin:0;list-style:none;}
a{text-decoration:none;}
*{box-sizing:border-box;}
.app{height:100%;width:100%;padding:80px 0 0 200px;overflow:hidden;}
.main{display:inline-block;width:100%;height:100%;overflow:auto;}
.row{display:inline-table;}
.col{display:table-cell;}
.w{width:100%;}.h{height:100%;}
.v-t{vertical-align: top;}.v-m{vertical-align: middle;}.v-b{vertical-align: bottom;}
.t-l{text-align:left;}.t-c{text-align:center;}.t-r{text-align:right;}
</style>
