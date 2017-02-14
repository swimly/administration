import Vue from 'vue'
import App from './App'
import router from './router'
import resource from 'vue-resource'

Vue.use(resource)
/* eslint-disable no-new */
new Vue({
  el: '#app',
  router,
  render: h => h(App)
})