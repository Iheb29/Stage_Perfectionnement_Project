<template>
  <div>
     
      <div v-if="confirm==0"
      >
      <h2>
    Add Info Personnel
      </h2>
              <form @submit.prevent="AddCommande()" style="margin: 50px">
          <div class="mb-3">
            <!-- <label class="form-label">Categorie name</label> -->
            <input
              type="text"
              name="nom"
              v-model="nom"
              placeholder="Name..."
              class="form-control rounded-pill p-4"
            />
            <br />
            <input
              type="text"
              v-model="prenom"
              placeholder="LastName..."
              name="prenom"
              class="form-control rounded-pill p-4"
            />
            <br />
            <input
              type="text"
              v-model="adresse_mail"
              placeholder="Entrer Email Address..."
              name="Email"
              class="form-control rounded-pill p-4"
            />
            <br />
            <input
              type="text"
              placeholder="ville"
              v-model="ville"
              name="ville"
              class="form-control rounded-pill p-4"
            />
            <br />

          </div>

          <button type="submit" name="submit" class="btn btn-primary">
            CONTINUE
          </button>
          <button type="reset" class="btn btn-danger">FERMER</button>
        </form>
      </div>
      <div v-else-if="confirm==1" class="text-center py-5 mt-5"
      >
             <card
                  class="mb-12"
                  height="200px"
                  style="padding:25px"
                >
                 <div style="font-size:18px;font-weight:600" class="mb-2 mt-2 text-center">
                   Nom : {{ nom }}<br>
                   Prenom : {{ prenom }} <br>
                   Email  {{ adresse_mail }} <br>
                   Ville : {{ ville }}
                 </div>
            </card>
            <div class="text-center">
            <button  @click="passCommande()" class="mx-5 mb-2" color="#000" style="color:#fff !important">
                Valider Commande
            </button>
                <button @click="confirm=0">
                  Fermer
                </button>
         </div>
         </div>
      <div v-else class="text-center py-5 mt-5"
      >
                  MERCI POUR VOTRE COMMANDE !
                  <br>
                Votre commande # est : {{ code_Commande }}.
                  <br>
                  Nous vous enverrons la confirmation de commande avec les détails et les informations de suivi.
      </div>
    </div>
  </div>
</template>

<script>
import Vue from 'vue'
import VueConfetti from 'vue-confetti'
Vue.use(VueConfetti)
import CommandeService from "../../service/Commande_service/CommandeService.js"
import {AuthStore} from "../../store/index.js"
export default {
   props:{
      prix_total:Number
    },
    setup(){
    const store=AuthStore();
    return {store}
  },
  data() {
    return {
      nom: "",
      prenom: "",
      adresse_mail: "",
      ville: "",
      confirm:false,
      code_Commande:""
    };
  },
  methods: {
    passCommande(){
        let UserInfo={
            nom:this.nom,
            prenom:this.prenom,
            ville:this.ville,
            adresse_mail:this.adresse_mail,
            userid:this.store.isauth!=null ? this.store.user['id'] : null
        }
        this.code_Commande=Math.floor(Math.random() * 99999);

        CommandeService.AddCommande({
            user:UserInfo,
            code_Commande: this.code_Commande,
            product:JSON.stringify(JSON.parse(localStorage.getItem("products"))),
            prix_total:this.prix_total
        }).then((res)=>{
            this.$confetti.start();
            setTimeout(()=>this.$confetti.stop(),2000);
            setTimeout(()=>this.$router.push({name:"menu"}),2500);
        })
    },
    AddCommande(){
      this.confirm=1;
    }
  },
};
</script>
