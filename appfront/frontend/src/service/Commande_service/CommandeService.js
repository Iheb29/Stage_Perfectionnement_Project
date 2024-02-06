import axios from "axios"
import "@/plugins/axios"

export default 
{

    getMyCommandes(id){
        return axios.get(`/getMyCommandes/${id}`);
    },
    getCommandes(status){
        return axios.get(`/getCommandes?status=${status}`);
    },
    DeletCommande(id){
        return axios.delete(`/deleteCommande/${id}`);
    },
    AddCommande(data){
        return axios.post("/addCommande",data);
    },
    AcceptCommande(id){
        return axios.put("/AccepteCommande/"+id);
    },
    RejectCommande(id){
        return axios.put("/RejectComande/"+id);
    }
}