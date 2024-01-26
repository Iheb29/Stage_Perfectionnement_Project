<template>
<div class="all container">
    <div class="card shadow-lg mt-3">
        <h3 style="text-align: center;">Update product</h3>


    </div>

    <form class="formu" @submit.prevent="UpdateProudct()" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="id" >
        <div class="mb-3">
            <div>
                <label class="form-label">product name</label>
                <input type="text" v-model="nom"
                    class="form-control "
                    id="exampleInputNom ">
            </div>
            <div>
                <label class="form-label">product price</label>
                <input type="number" v-model="prix"
                    class="form-control "
                    id="exampleInputprix ">
            </div>
            <div>
                <img :src="'http://localhost:8000'+image" style="width: 100px;height: 100px;" />
                <label class="form-label">product picture</label><br>
                <input type="file" name="photo" ref="photo" @click="UploadPhoto">
            </div>
            <br>
            <br>
        </div>
        <button type="submit" class="btn btn-warning" name="submit">Update</button>
    </form>
</div>
</template>

<script>
import ProductService from "@/service/product_service/ProductService.js";
export default{
    props:{
        id:Number
    },
    created(){
        this.getProductById();
    },
    data(){
        return {
            nom:"",
            prix:"",
            image:"",
            upload:0
        }
    },
    methods:{
        UploadPhoto(){
            this.image=this.$refs.photo.files[0];
            this.upload=1;
        },
        UpdateProudct(){
            ProductService.UpdateProudct({
                nom:this.nom,
                prix:this.prix,
                image:this.image,
                upload:this.upload
            },this.id).then((res)=>{
                this.$router.go();
            })
        },
        getProductById(){
            ProductService.getProductById(this.id).then((res)=>{
                this.nom=res.data.data['nom'];
                this.prix=res.data.data['prix'];
                this.image=res.data.data['image'];
            })
        }
    }
}
</script>