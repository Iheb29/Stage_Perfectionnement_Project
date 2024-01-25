<template>
    <div>
        <div class="d-flex">
            <SideBar @changeView="changeView"></SideBar>
            <div v-if="view=='Consulte'" class="w-100">
                <ListProduct  @changeView="changeView"></ListProduct>
            </div>
            <div v-else="view=='add'">
                <AddProduct  @changeView="changeView"></AddProduct>
            </div>
        </div>
    </div>
</template>

<script>
import ListProduct from "../../components/adminService/listProducts.vue"
import AddProduct from "../../components/adminService/AddProduit.vue"
import SideBar from "../../components/adminService/SideBar.vue";
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
            SideBar,AddProduct,ListProduct
        }
    }
</script>