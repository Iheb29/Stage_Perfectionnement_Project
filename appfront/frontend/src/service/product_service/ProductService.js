import axios from "axios"
import "@/plugins/axios"


export default 
{
    getProducts(){
        return axios.get("/products");
    },
    AddProduct(product){

        let data=new FormData();
        data.append("nom",product.nom);
        data.append("prix",product.prix);
        data.append("photo",product.image);
        const config={
            Headers:{
                "content-Type":"multipart/form-data"
            }
        }
        return axios.post("/addProduct",data,config)
    },
    DeletProduct(id){
        return axios.delete(`/deleteProduit/${id}`);
    },
    UpdateProudct(product,id){

        let data=new FormData();
        data.append("nom",product.nom);
        data.append("prix",product.prix);
        data.append("photo",product.image);
        const config={
            Headers:{
                "content-Type":"multipart/form-data"
            }
        }
        return axios.post(`/UpdateProduct/${id}`,data,config)
    },


}