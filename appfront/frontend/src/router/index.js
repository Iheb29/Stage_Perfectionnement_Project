import Vue from 'vue'
import VueRouter from 'vue-router'
 import HomeView from '../views/HomeView.vue'
 import SignUp from '../views/auth/SignUp.vue'
import SignIn from '../views/auth/Login.vue'
import DashboardAdmin from '../views/admin/dashboardAdminView.vue'
 import menu from '../views/menu/menu.vue'

Vue.use(VueRouter)

const routes = [
  {
    path: '/',
    name: 'home',
    component: HomeView
  },
  {
    path: '/signup',
    name: 'signup',
    component: SignUp
  },
  {
    path: '/signin',
    name: 'signin',
    component: SignIn
  },
  {
    path: '/DashboardAdmin',
    name: 'DashboardAdmin',
    component: DashboardAdmin
  },
  {
    path: '/menu',
    name: 'menu',
    component: menu
  },
  // {
  //   path: '/about',
  //   name: 'about',
  //   // route level code-splitting
  //   // this generates a separate chunk (about.[hash].js) for this route
  //   // which is lazy-loaded when the route is visited.
  //   component: () => import(/* webpackChunkName: "about" */ '../views/AboutView.vue')
  // }
]

const router = new VueRouter({
  mode: 'history',
  base: process.env.BASE_URL,
  routes
})

export default router
