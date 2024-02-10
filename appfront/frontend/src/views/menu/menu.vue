<template>
  <div>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="#!">Les Ciments De Bizerte</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                      <RouterLink to="/">
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="#!">Home</a></li>
                      </RouterLink>
                       
                    </ul>
                        <button class="btn btn-outline-dark" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            <i class="bi-cart-fill me-1"></i>
                           
                            
                            <i  class="material-icons mx-2">shopping_cart</i>
                            <span class="badge bg-dark text-white ms-1 rounded-pill">
                                {{ CountProducts }}
                            </span>
                        </button>
        <div class="dropdown text-end mx-2" v-if="store.isauth">
          <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
            <img :src="'http://localhost:8000'+store.user['image']" alt="photo user" width="32" height="32" class="rounded-circle">
          </a>
          <ul class="dropdown-menu text-small" aria-labelledby="dropdownUser1">
            <li ><a class="dropdown-item" href="#" >
                 {{store.user['nom'] +' '+store.user['prenom']}}
            </a></li>
            <li @click="ShowAddCommande=2"><a class="dropdown-item" href="#" >
                  My Commandes
            </a></li>
            <li><hr class="dropdown-divider"></li>
            <li @click="Logout()"><a class="dropdown-item" href="#">Sign out</a></li>
          </ul>
        </div>
        <div class="dropstart mx-2">
  <div  class="notif position-relative"  data-bs-toggle="dropdown" aria-expanded="false">
    <i  class="material-icons mx-2">notifications</i>
    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" >
    {{Notifications.length}}
  </span>
  </div>
  <ul class="dropdown-menu Scroll_contianer"  v-if="Notifications!=''">
    <li v-for="Notification in Notifications" :key="Notification.id"><a class="dropdown-item" href="#">{{Notification.message}}</a></li>
  </ul>
  <ul class="dropdown-menu " v-else >
    <li ><a class="dropdown-item" href="#">Empty Notifications</a></li>
  </ul>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Confirm Achat</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <section class="h-100 h-custom" style="background-color: #eee;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col">
        <div class="card">
          <div class="card-body p-4">

            <div class="row">

              <div class="col-lg-7">
                <h5 class="mb-3"><a href="#!" class="text-body"><i
                      class="fas fa-long-arrow-alt-left me-2"></i>Continue shopping</a></h5>
                <hr>

                <div class="d-flex justify-content-between align-items-center mb-4">
                  <div>
                    <p class="mb-1">Shopping cart</p>
                    <p class="mb-0">You have {{ CountProducts }} items in your cart</p>
                  </div>
                </div>

                <div class="card mb-3" v-for="product in StoreProducts" :key="product">
                  <div class="card-body">
                    <div class="d-flex justify-content-between">
                      <div class="d-flex flex-row align-items-center">
                        <div>
                          <img
                            :src="'http://localhost:8000'+product.product.image"
                            class="img-fluid rounded-3" alt="Shopping item" style="width: 65px;">
                        </div>
                        <div class="ms-3">
                          <h5>{{product.product.nom}}</h5>
                          <p class="small mb-0">{{ product.product.prix }} TND</p>
                        </div>
                      </div>
                      <div class="d-flex flex-row align-items-center">
                        <div style="width: 50px;">
                          <h5 class="fw-normal mb-0"> Qte : {{ product.qte }}</h5>
                        </div>
                        <a href="#!" style="color: #cecece;"><i class="fas fa-trash-alt"></i></a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-5">

                <div class="card bg-primary text-white rounded-3">
                  <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                      <h5 class="mb-0">Card details</h5>
                       <img  v-if="store.isauth" :src="'http://localhost:8000'+store.user['image']"
                        class="img-fluid rounded-3" style="width: 45px;" alt="Avatar">
                    </div>
                    <hr class="my-4">
                    <div class="d-flex justify-content-between mb-4">
                      <p class="mb-2">Total(Incl. taxes)</p>
                      <p class="mb-2">{{ total }}</p>
                    </div>

                    <button type="button" class="btn btn-info btn-block btn-lg" @click="AddCommande()">
                      <div class="d-flex justify-content-between" >
                          <span>Checkout <i class="fas fa-long-arrow-alt-right ms-2"></i></span>
                      </div>
                    </button>

                  </div>
                </div>

              </div>

            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</section>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

                </div>
            </div>
        </nav>
        <!-- Header-->
        <header class="bg-dark py-5">
            <div class="container px-4 px-lg-5 my-5">
                <div class="text-center text-white">
                    <h1 class="display-4 fw-bolder">Our Products</h1>
                    <p class="lead fw-normal text-white-50 mb-0"></p>
                </div>
            </div>
        </header>
        <!-- Section-->
        <section class="py-5" v-if="ShowAddCommande==0">
            <div class="container px-4 px-lg-5 mt-5">
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                    
                    
                    
                   
                    <div class="col mb-5"  v-for="product in products" :key="product.id" >
                        <div class="card h-100">
                            <!-- Product image-->
                            <img :src="'http://localhost:8000'+product.image" alt="" width="100%">
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder">{{ product.nom }}</h5>
                                    <!-- Product reviews-->
                                    <div class="d-flex justify-content-center small text-warning mb-2">
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                    </div>
                                    <!-- Product price-->
                                    {{ product.prix }} TND
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div @click="AddProducts(product)" class="text-center"><a class="btn btn-outline-dark mt-auto" href="#">Add to cart</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section v-else-if="ShowAddCommande==1" style="height: 100vh;">
          <AddCommandeVue :prix_total="total"></AddCommandeVue>
        </section>
        <section v-else style="height: 100vh;">
<MyCommande></MyCommande>
        </section>
        <!-- Footer-->
        <footer class="py-5 bg-dark">
            <div class="container"><p class="m-0 text-center text-white">Copyright &copy; Les Ciments De Bizerte 2024</p></div>
        </footer>
      </div>
</template>
<script>

import ProductService from "@/service/product_service/ProductService.js";
import {AuthStore} from "../../store/index.js"
import AddCommandeVue from "../../components/ClientService/AddCommande.vue"
import { RouterLink } from "vue-router";
import MyCommande from "@/components/ClientService/MyCommande.vue";
import NotifService from "../../service/user_service/UserService.js"
export default {
    name:"ListView",
  setup(){
    const store=AuthStore();
    return {store}
  }, 
  mounted(){
    window.Echo.channel('public').listen('NotifEvent', (e) => {
      this.getNotification();
});
  },
    created(){
      this.getProducts();
      this.getNotification();
      this.GetStoreProducts();//??
    },
    data(){
      return {
        products:[],
        StoreProducts:[],
        ShowAddCommande:0,
        Notifications:[]
      }
    },
    methods:{
        GetStoreProducts(){
            this.StoreProducts=JSON.parse(localStorage.getItem("products"))??[];//??
        },
        getNotification(){
        NotifService.getNotif(this.store.user['id']).then((res)=>{
           this.Notifications=res.data.data;
        })
      },
        Logout(){
          this.store.logout();
          this.$router.push({name:"signin"});
        },
        AddProducts(product){
            let index=this.StoreProducts.findIndex((v)=>v.product.id==product.id);
            if(index!=-1){
                this.StoreProducts[index].qte++;
            }else{
                this.StoreProducts.push({
                    "product":product,
                    "qte":1
                })
                localStorage.setItem("products",JSON.stringify(this.StoreProducts));
            }
        },
        AddCommande(){
          if(this.store.isauth){
            this.ShowAddCommande=1;
          }else{
            alert("Your Are Not Authentifié");
          }
        },
        getProducts(){
        ProductService.getProducts().then((res)=>{
          this.products=res.data.data;
        })
      }
    },
    computed:{
        CountProducts(){
            return this.StoreProducts.length;
        },
        total(){
            let total=0;
            this.StoreProducts.forEach((v)=>{
                total+=v.product.prix * v.qte;
            })
            return total ; 

        }
    },
    components:{
    AddCommandeVue,
    MyCommande,
    RouterLink
}
}

</script>

<style>
.notif{
  cursor: pointer;
}

.Scroll_contianer{
  max-height: 200px;
  scroll-behavior: smooth;
  overflow-y: scroll;
}
</style>