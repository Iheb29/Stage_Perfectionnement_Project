<template>
    <div class="p-5" style="width: 100% !important;">
      <p class="titre text-center">List Commandes</p>
      <table class="table p-2">
          <thead>
              <tr>
                <th>Id</th>
                <th>Nom</th>
                <th>Prenom</th>
                <th>Adresse Email</th>
                <th>Prix Total</th>
                <th>Actions</th>
              </tr>
          </thead>
          <tbody v-if="commandes==''">
              <tr>
                 <td class="text-center" colspan="5">Not Data Found</td>
              </tr>
          </tbody>
          <tbody v-else>
              <tr v-for="commande in commandes" :key="commande.id">
                <td>{{commande.id}}</td>
                <td>{{ commande.nom }}</td>
                <td>{{ commande.prenom }} </td>
                <td>{{ commande.adresse_email }} </td>
                <td>{{ commande.prix_total }} </td>
                
                <td>
                     <button class="btn btn-danger mx-2" @click="DeletCommande(commande.id)" >Delete</button>
                     <button class="btn btn-success">Accept</button>
                </td>
              </tr>
          </tbody>
   
      </table>
   </div>
</template>
<script>
import CommandeService from "@/service/Commande_service/CommandeService.js";
import CommandeService from "@/service/Commande_service/CommandeService.js"
export default {
    name:"ListView",
    created(){
      this.getCommandes();
    },
    data(){
      return {
        commandes:[]
      }
    },
    methods:{

      getCommandes(){
        CommandeService.getCommandes().then((res)=>{
          this.commandes=res.data.data;
        })
      },
      DeletCommande(id){
        CommandeService.DeletCommande(id).then((res)=>{
          this.getCommandes();
        })
      },
      

    }
}
</script>