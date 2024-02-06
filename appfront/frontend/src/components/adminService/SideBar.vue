<template>
    <div>
        <div class="d-flex flex-column flex-shrink-0 p-3 text-bg-dark" style="width: 280px;height: 100vh;">
    <a href="#" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
      <i  class="material-icons mx-2">admin_panel_settings</i>
      <span class="fs-4">Admin</span>
    </a>
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
export default {
  setup(){
    const store=AuthStore();
    return {store}
  },
  props:{
    view:String
  },
    name:"DashboardView",
    methods:{
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
</style>