import axios from "axios"
import "@/plugins/axios"

export default 
{
    getCommandes(){
        return axios.get("/products");
    },
    DeletCommande(id){
        return axios.delete(`/deleteCommande/${id}`);
    },
}