<template>
    <div>
        <div class="d-flex">
            <SideBar @changeView="changeView" :view="view"></SideBar>
            <div v-if="view=='Consulte'" class="w-100">
                <ListProduct  @changeView="changeView"></ListProduct>
            </div>
            <div v-else-if="view=='add'" class="w-100">
                <AddProduct  @changeView="changeView"></AddProduct>
            </div>
            <div v-else-if="view=='Commande'" class="w-100">
                <listCommande  @changeView="changeView"></listCommande>
            </div>
            <div v-else-if="view=='user'" class="w-100">
                <ListUser></ListUser>
            </div>
        </div>
    </div>
</template>

<script>
import ListProduct from "../../components/adminService/listProducts.vue"
import AddProduct from "../../components/adminService/AddProduit.vue"
import SideBar from "../../components/adminService/SideBar.vue";
import ListUser from "@/components/adminService/listUser.vue";
import listCommande from "@/components/adminService/listCommande.vue";
    export default {
        data(){
            return {
                view:"Consulte"
            }
        },
        methods:{
            changeView(data){
                this.view=data;
            }
        },
        components :{
            SideBar,AddProduct,ListProduct,ListUser,listCommande
        }
    }
</script>