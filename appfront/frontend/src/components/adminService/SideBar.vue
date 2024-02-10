<template>
    <div>
        <div class="d-flex flex-column flex-shrink-0 p-3 text-bg-dark" style="width: 280px;height: 100vh;">
    <div class="d-flex align-items-center">
          <a href="#" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
      <i  class="material-icons mx-2">admin_panel_settings</i>
      <span class="fs-4">Admin</span>
    </a>
<div class="dropdown mx-2">
  <div  class="notif position-relative"  data-bs-toggle="dropdown" aria-expanded="false">
    <i  class="material-icons mx-2">notifications</i>
    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" >
    {{Notifications.length}}
  </span>
  </div>
  <ul class="dropdown-menu Scroll_contianer"  v-if="Notifications!=''">
    <li v-for="Notification in Notifications" :key="Notification.id"><a class="dropdown-item" href="#">{{Notification.message}}</a></li>
  </ul>
  <ul class="dropdown-menu" v-else>
    <li ><a class="dropdown-item" href="#">Empty Notifications</a></li>
  </ul>
</div>
</div>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
      <li class="nav-item" >
        <a  class="nav-link" :class="view=='Consulte' ? 'active' :''"  aria-current="page" @click="changeView('Consulte')">
          <i  class="material-icons mx-2">category</i>
                  Products
        </a>
        <br>
        
       
      </li>
      <li class="nav-item" >
        <a  class="nav-link "  :class="view=='Commande' ? 'active' :''"  aria-current="page" @click="changeView('Commande')">
          <i  class="material-icons mx-2">add_shopping_cart</i>
                  Commandes
        </a>
        <br>
      
        
      </li>
      <li class="nav-item" >
        <a  class="nav-link "  :class="view=='user' ? 'active' :''"  aria-current="page" @click="changeView('user')">
          <i  class="material-icons mx-2">person</i>
                  Users
        </a>
      </li>
    </ul>
    <hr>
    <button class="btn btn-info" @click="logout()" ><i  class="material-icons mx-2">logout</i>Logout</button>
</div>
    </div>
</template>

<script>
import {AuthStore} from "../../store/index.js"
import NotifService from "../../service/user_service/UserService.js"
export default {
  created(){
    this.getNotification();
  },
  setup(){
    const store=AuthStore();
    return {store}
  },
  props:{
    view:String
  },
  mounted(){
    window.Echo.channel('public').listen('NotifEvent', (e) => {
      this.getNotification();
});
  },
  data(){
    return {
      Notifications:[]
    }
  },
    name:"DashboardView",
    methods:{
      getNotification(){
        NotifService.getNotif(this.store.user['id']).then((res)=>{
           this.Notifications=res.data.data;
        })
      },
      changeView(data){
        this.$emit("changeView",data);
      },
      logout(){
        this.store.logout();
        this.$router.push({name:"signin"});
      }
    }
}
</script>

<style scoped>
li{
  cursor: pointer;
}
.notif{
  cursor: pointer;
}

.Scroll_contianer{
  max-height: 200px;
  scroll-behavior: smooth;
  overflow-y: scroll;
}
</style>