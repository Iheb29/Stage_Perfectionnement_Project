<template>
  <div class="p-5" style="width: 100% !important">
    <p class="titre text-center">List Commandes</p>
    <div class="mb-5" >
      <div v-if="commandes == ''">
        <p class="text-center">Not Data Found</p>
      </div>
      <div v-else class="row gap-4">
        <div v-for="commande in commandes" class="col-lg-3 card" style="width: 19rem">
          <div class="card-body">
            <h5 class="card-title">
              Client : {{ commande.nom }} {{ commande.prenom }}
            </h5>
            <p class="card-text">
             Prix Total :{{ commande.prix_total }} TND
            </p>
            <div class="d-flex gap-4">
              <button
                class="btn btn-danger mx-2"
                @click="RejectCommande(commande.id)"
              >
                Reject
              </button>
              <button
                class="btn btn-success"
                @click="AccepteCommande(commande.id)"
              >
                Accept
              </button>
              <button
                type="button"
                class="btn btn-primary"
                data-bs-toggle="modal"
                :data-bs-target="'#exampleModal' + commande.id"
              >
                View
              </button>
            </div>
            <div
              class="modal fade"
              :id="'exampleModal' + commande.id"
              tabindex="-1"
              aria-labelledby="exampleModalLabel"
              aria-hidden="true"
            >
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">
                      Code Commande : {{ commande.code_commande }}
                    </h5>
                    <button
                      type="button"
                      class="btn-close"
                      data-bs-dismiss="modal"
                      aria-label="Close"
                    ></button>
                  </div>
                  <div class="modal-body">
                    <div class="modal-body">
                      <h2>Info Ligne Commande</h2>
                      <table class="table">
                        <thead>
                          <tr>
                            <th>Quantite</th>
                            <th>Prix Ligne Commande</th>
                            <th>Product Id</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr
                            v-for="ligne in commande.lignecommande"
                            :key="ligne.id"
                          >
                            <td>{{ ligne.quantite }}</td>
                            <td>{{ ligne.prix_ligne_commande }}</td>
                            <td>{{ ligne.produit_id }}</td>
                          </tr>
                        </tbody>
                      </table>
                      <h2 class="mt-3">Info User</h2>
                      <table class="table">
                        <thead>
                          <tr>
                            <th>nom</th>
                            <th>prenom</th>
                            <th>adresse_mail</th>
                            <th>ville</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>{{ commande.nom }}</td>
                            <td>{{ commande.prenom }}</td>
                            <td>{{ commande.adresse_mail }}</td>
                            <td>{{ commande.ville }}</td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button
                      type="button"
                      class="btn btn-secondary"
                      data-bs-dismiss="modal"
                    >
                      Close
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <hr>
    <div class="mt-5 w-100" style="width: 100% !important">
      <Reject_Accepte_Commande></Reject_Accepte_Commande>
    </div>
  </div>
</template>
<script>
import Reject_Accepte_Commande from "../../components/adminService/Reject_Accepte_Commande.vue";
import CommandeService from "../../service/Commande_service/CommandeService.js";
export default {
  name: "ListView",
  created() {
    this.getCommandes();
  },
  data() {
    return {
      commandes: [],
    };
  },
  methods: {
    getCommandes() {
      CommandeService.getCommandes(0).then((res) => {
        this.commandes = res.data.data;
      });
    },
    RejectCommande(id) {
      CommandeService.RejectCommande(id).then((res) => {
        this.getCommandes();
      });
    },
    AccepteCommande(id) {
      CommandeService.AcceptCommande(id).then((res) => {
        this.getCommandes();
      });
    },
  },
  components:{
      Reject_Accepte_Commande
    }
};
</script>
