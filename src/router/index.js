import Vue from 'vue'
import Router from 'vue-router'
import Home from 'views/home'
import Hello from 'components/Hello'
import User from 'views/user'
import Count from 'views/count'
import UserDel from 'views/UserDel'
import EditPassword from 'views/editPassword'
import Chart from 'components/chart'

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
      name: 'userdel',
      component: UserDel
    }]
})
