import Vue from 'vue'
import App from './App'
import router from './router'
import resource from 'vue-resource'
import BaiduMap from 'vue-baidu-map'
import VueResource from 'vue-resource'
Vue.use(VueResource)
Vue.use(BaiduMap, {
  ak: 'fDuKEkLg3k3s402ibQrR6irW'
})

Vue.use(resource)
/* eslint-disable no-new */
new Vue({
  el: '#app',
  router,
  render: h => h(App)
})