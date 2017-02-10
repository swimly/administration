import Vue from 'vue'
import App from './App'
import router from './router'
import BaiduMap from 'vue-baidu-map'
Vue.use(BaiduMap, {
  ak: 'fDuKEkLg3k3s402ibQrR6irW'
})

/* eslint-disable no-new */
new Vue({
  el: '#app',
  router,
  render: h => h(App)
})