import axios from "axios"
import "@/plugins/axios"

export default 
{
    AddUser(user){
        console.log(user);
        let data=new FormData();
        data.append("nom",user.nom);
        data.append("prenom",user.prenom);
        data.append("email",user.email);
        data.append("password",user.password);
        data.append("num_tlf",user.num_tlf);
        data.append("photo",user.image);
        const config={
            Headers:{
                "content-Type":"multipart/form-data"
            }
        }
        return axios.post("/addUser",data,config)
    },
    DeletUser(id){
        return axios.delete(`/deleteUser/${id}`);
    },
    getUsers(){
        return axios.get("/Users");
    },

}