import Vue from 'vue'
import './plugins/axios'
import App from './App.vue'
import router from './router'
import store from './store'
import { createPinia, PiniaVuePlugin } from 'pinia'

import "bootstrap";
import "bootstrap/dist/css/bootstrap.min.css";
import "bootstrap/dist/js/bootstrap";
import "bootstrap/js/src/dropdown";
import "bootstrap/js/src/modal";

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
