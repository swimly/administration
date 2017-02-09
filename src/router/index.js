import Vue from 'vue'
import Router from 'vue-router'
import Home from 'views/home'
import Hello from 'components/Hello'
import User from 'views/user'
import UserAdd from 'views/UserAdd'
import UserDel from 'views/UserDel'
import EditPassword from 'views/editPassword'

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
      path: '/user/add',
      name: 'useradd',
      component: UserAdd
    }, {
      path: '/user/del',
      name: 'userdel',
      component: UserDel
    }]
})
