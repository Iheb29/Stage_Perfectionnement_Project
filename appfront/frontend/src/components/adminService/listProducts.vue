<template>
 

   <div class="p-5" style="width: 100% !important;">
      <p class="titre text-center">List Menu</p>
      <button @click="changeView('Add')"  class="btn btn-primary">Add</button>
      <table class="table p-2">
          <thead>
              <tr>
                <th>Id</th>
                <th>Nom</th>
                <th>prix</th>
                <th>Image</th>
                <th>Actions</th>
              </tr>
          </thead>
          <tbody v-if="products==''">
              <tr>
                 <td class="text-center" colspan="5">Not Data Found</td>
              </tr>
          </tbody>
          <tbody v-else>
              <tr v-for="product in products" :key="product.id">
                <td>{{product.id}}</td>
                <td>{{ product.nom }}</td>
                <td>{{ product.prix }} TND</td>
                <td><img :src="'http://localhost:8000'+product.image" alt="" width="100px"></td>
                <td>
                     <button class="btn btn-danger mx-2" @click="Deletproduct(product.id)" >Delete</button>
                     <button class="btn btn-warning">Update</button>
                </td>
              </tr>
          </tbody>
   
      </table>
   </div>
    </template>


<script>
import ProductService from "@/service/product_service/ProductService.js";
import PoructService from "@/service/product_service/ProductService.js"
export default {
    name:"ListView",
    created(){
      this.getProducts();
    },
    data(){
      return {
        products:[]
      }
    },
    methods:{
      changeView(data){
        this.$emit("changeView",data);
      },
      getProducts(){
        PoructService.getProducts().then((res)=>{
          this.products=res.data.data;
        })
      },
      Deletproduct(id){
        ProductService.DeletProduct(id).then((res)=>{
          this.getProducts();
        })
      }
    }
}
</script>