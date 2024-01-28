import Vue from 'vue'
import './plugins/axios'
import App from './App.vue'
import router from './router'
import store from './store'
import { createPinia, PiniaVuePlugin } from 'pinia'


Vue.config.productionTip = false
Vue.use(PiniaVuePlugin)
const pinia = createPinia()

new Vue({

  el: '#app',
  pinia,
  router,
  store,
  render: h => h(App)
}).$mount('#app')
