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
import Echo from "laravel-echo"
window.Pusher = require('pusher-js');

window.Echo = new Echo({
   broadcaster: 'pusher',
   key: "local",
   wsHost:"127.0.0.1",
   wsPort: 6001,
   cluster: "mt1",
   forceTLS: false,
   disableStats: true,
});
new Vue({
  el: '#app',
  pinia,
  router,
  store,
  render: h => h(App)
}).$mount('#app')
