<template>
    <div class="p-5" style="width: 100% !important;">
      <p class="titre text-center">List Personnes</p>
      <table class="table p-2" >
          <thead>
              <tr>
                <th>Id</th>
                <th>Image</th>
                <th>Nom</th>
                <th>Prenom</th>
                <th>Numero Telephone</th>
                <th>Actions</th>
              </tr>
          </thead>
          <tbody v-if="users==''">
              <tr>
                 <td class="text-center" colspan="5">Not Data Found</td>
              </tr>
          </tbody>
          <tbody v-else>
              <tr v-for="user in users" :key="user.id">
                <td>{{user.id}}</td>
                <td><img :src="'http://localhost:8000'+user.image" alt="" width="100px"></td>
                <td>{{ user.nom }}</td>
                <td>{{ user.prenom}}</td>
                <td>{{ user.num_tlf }}</td>
                
                <td>
                     <button class="btn btn-danger mx-2" @click="DeleteUser(user.id)" >Delete</button>
                     
                </td>
              </tr>
          </tbody>
   
      </table>
   </div>
</template>
<script>
import UserService from "@/service/user_service/UserService.js";
export default {
    name:"ListView",
    created(){
      this.getUsers();
    },
    data(){
      return {
        users:[]
      }
    },
    methods:{
      getUsers(){
        UserService.getUsers().then((res)=>{
          this.users=res.data.data;
        })
      },
      DeleteUser(id){
        UserService.DeletUser(id).then((res)=>{
          this.getUsers();
        })
      },
      

    }
}



</script>