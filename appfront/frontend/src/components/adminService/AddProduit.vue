<template>
<div class="all container">
    <div class="card shadow-lg mt-3">
        <h3 style="text-align: center;">add product</h3>
    </div>
    <form @submit.prevent="AddProduct()" enctype="multipart/form-data">
        <div class="mb-3">
            <div>
                <label class="form-label">product name</label>
                <input type="text" name="nom"
                    class="form-control " 
                    v-model="nom"
                    id="exampleInputNom ">
               
            </div>
            <div>
                <label class="form-label">product price</label>
                <input type="number" name="prix"
                    class="form-control" 
                    v-model="prix"
                    id="exampleInputprix ">
                
            </div>
           
            <div>
                <label class="form-label">product picture</label><br>
                <input type="file" name="photo" ref="photo" @change="UploadFile">
            </div>
            <br>
            
            <br>



        </div>

        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
    </form>

</div>

</template>

<script>
import ProductService from "../../service/product_service/ProductService.js"
export default {
    data(){
        return {
            nom:"",
            prix:"",
            image:""
        }
    },
    methods:{
        AddProduct(){
            ProductService.AddProduct({
                nom:this.nom,
                prix:this.prix,
                image:this.image
            }).then((res)=>{
                this.$emit("changeView",'Consulte');
            })
        },
        UploadFile(){
            this.image=this.$refs.photo.files[0];
        }
    }
}
</script>