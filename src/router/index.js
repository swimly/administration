import Vue from 'vue'
import Router from 'vue-router'
import Home from 'views/home'
import Hello from 'components/Hello'
import User from 'views/user'
import Count from 'views/count'
import UserCatory from 'views/userCatory'
import EditPassword from 'views/editPassword'
import UserList from 'views/userList'
import Chart from 'components/chart'
import DatabaseList from 'views/databaseList'
import DatabaseSetting from 'views/databaseSetting'
import ProjectList from 'views/projectList'

Vue.use(Router)

export default new Router({
  mode: 'hash',
  routes: [{
      path: '/',
      redirect: '/home',
      name: 'Hello',
      component: Hello
    }, {
      path: '/home',
      name: 'home',
      component: Home,
      children: [
        {path: 'editPassword', component: EditPassword}
      ]
    }, {
      name: 'user',
      path: '/user',
      redirect: '/user/cout/area',
      component: User
    }, {
      path: '/user/count',
      name: 'count',
      redirect: '/user/count/area',
      component: Count,
      children: [
        {path: '/user/count/:id', components: {default: Count, count: Chart}}
      ]
    }, {
      path: '/user/catory',
      name: 'usercatory',
      component: UserCatory
    }, {
      path: '/user/list',
      name: 'userlist',
      redirect: '/user/list/1',
      component: UserList,
    }, {
      path: '/user/list/:page',
      name: 'userlist',
      component: UserList,
    }, {
      path: '/project/list',
      name: 'userlist',
      redirect: '/project/list/1',
      component: ProjectList,
    }, {
      path: '/project/list/:page',
      name: 'userlist',
      component: ProjectList,
    }, {
      path: '/database/list',
      name: 'databaselist',
      component: DatabaseList
    }, {
      path: '/database/setting',
      name: 'databasesetting',
      component: DatabaseSetting
    }]
})
