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
html{font-size:62.5%;}
html,body{height:100%;margin:0;font-family:"Microsoft YaHei"}
h1,h2,h3,h4,h5,h6,p{margin:0;}
ul,li,dt,dl,dd{padding:0;margin:0;list-style:none;}
input:focus{outline:none;}
input{font-family:"Microsoft YaHei"}
a{text-decoration:none;}
*{box-sizing:border-box;}
.app{height:100%;width:100%;padding:80px 0 0 200px;overflow:hidden;}
.main{display:inline-block;width:100%;height:100%;overflow:auto;}
.row{display:inline-table;}
.col{display:table-cell;}
.w{width:100%;}.h{height:100%;}
.w-10{width:10%;}.w-20{width:20%;}.w-30{width:30%;}.w-40{width:40%;}.w-50{width:50%;}.w-60{width:60%;}.w-70{width:70%;}.w-80{width:80%;}.w-90{width:90%;}
.v-t{vertical-align: top;}.v-m{vertical-align: middle;}.v-b{vertical-align: bottom;}
.t-l{text-align:left;}.t-c{text-align:center;}.t-r{text-align:right;}
.fs-12{font-size:12px;}.fs-14{font-size:14px;}.fs-16{font-size:16px;}.fs-18{font-size:18px;}
.c-9{color:#999;}
.form{display:inline-block;}
.form input[type=text]{font-size:14px;border:1px solid #ccc;padding:0.7em 1em;border-radius:0.3em;width:100%;transition:0.3s;}
.form input[type=text]:focus{transform: translateY(-2px);box-shadow:0 2px 5px #ccc;}
.form-table th{font-weight:normal;font-size:1.4em;color:#666;text-align:right;}
.form-table td{padding:0.5em 1em;}
.btn{display:inline-block;padding:0.5em 2em;color:#fff;border-radius:0.3em;cursor: pointer;}
.btn:hover{opacity:0.9;filter:alpha(opacity=90)}
.btn:active{opacity:1;filter:alpha(opacity=100)}
.btn-blue{background:#559EFE;}
.btn-orange{background:#FF9900;}
.content{padding:10px;}
</style>
