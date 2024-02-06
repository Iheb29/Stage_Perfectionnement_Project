<template>
    <div class="p-5" style="width: 100% !important">
        <div class="d-flex justify-content-between">
            <div>
                <p class="titre text-center">List Commandes {{ Commande_Type }}</p>
            </div>
            <div>
                <button class="btn btn-outline-primary" @click="ChangerStatus()">{{ Commande_Type }}</button>
            </div>
        </div>
     
      <div >
       <table class="table">
          <thead>
             <tr>
                <th>#</th>
                <th>nom</th>
                <th>PrxTotal</th>
                <th>NbrProduit</th>
                <th>Opertaion</th>
             </tr>
          </thead>
          <tbody>
            <tr v-for="commande in commandes" :key="commande.id">
                <td>{{ commande.id }}</td>
                 <td>{{ commande.nom }}</td>
                 <td>{{ commande.prix_total }}</td>
                 <td>{{ commande.lignecommande.length  }}</td>
                <td>
                    <button class="btn btn-danger" @click="deleteCommande(commande.id)">Delete</button>
                </td>
            </tr>
          </tbody>
       </table>
      </div>
    </div>
  </template>
  <script>
  import CommandeService from "../../service/Commande_service/CommandeService.js";
  export default {
    name: "Reject_Accepte",
    created() {
      this.getCommandes();
    },
    data() {
      return {
        commandes: [],
        status:1,
        Commande_Type:"Accepter"
      };
    },
    methods: {
      getCommandes() {
        CommandeService.getCommandes(this.status).then((res) => {
          this.commandes = res.data.data;
        });
      },
      deleteCommande(id) {
        CommandeService.DeletCommande(id).then((res) => {
          this.getCommandes();
        });
      },
      ChangerStatus(){
        this.status=this.status==1 ? 2 : 1;
        this.Commande_Type=this.status==1 ? 'Accepter' : "Rejeter";
        this.getCommandes();
      }
    },
  };
  </script>
  