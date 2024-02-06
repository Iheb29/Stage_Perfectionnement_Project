<template>
  <div class="container">
     
      <div v-if="confirm==0"
      >
      <h2>
       Add Commande
      </h2>
      <form @submit.prevent="AddCommande()" style="margin: 50px">
          <div class="mb-3">
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
              placeholder=" Email Address..."
              name="Email"
              class="form-control rounded-pill p-4"
            />
            <br />
            <input
              type="text"
              placeholder="City"
              v-model="ville"
              name="ville"
              class="form-control rounded-pill p-4"
            />
           

          </div>

          <button type="submit" name="submit" class="btn btn-primary">
            CONTINUE
          </button>
          <button type="reset" class="btn btn-danger">FERMER</button>
        </form>
      </div>
      
         <div v-else-if="confirm==1" class="d-flex justify-items-center w-100 card text-center" >
             <div class="card-header">Featured</div>
               <div class="card-body">
                     <h5 class="card-title"> Nom : {{ nom }} </h5>
                               <br/>
                     <h5 class="card-title"> Prenom : {{ prenom }}</h5>
                     <h5 class="card-title"> Email: {{ adresse_mail }} </h5>
                     <h5 class="card-title"> Ville: {{ ville }} </h5>
                     <br/>
                       <a  @click="passCommande()" href="#" class="btn btn-primary">Confirmer Commande !</a>
               </div>
              <button  @click="confirm=0" class="card-footer text-muted">Fermer</button>
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
            localStorage.removeItem("products");
            setTimeout(()=>this.$confetti.stop(),2000);
            setTimeout(()=>this.$router.go(),2500);
        })
    },
    AddCommande(){
      this.confirm=1;
    }
  },
};
</script>



