import axios from "axios";
import {AuthStore} from "../../store/index";
import "@/plugins/axios"


export default{

    async signInUser(email,password){
        const store=AuthStore();
        const res=await axios.post('/login',{email,password});
        if(res.status==200){
          store.login(res.data.data.token,res.data.data.user,res.data.data.IsAdmin);
        }else{
          store.logout();
        }
     },  

     

}