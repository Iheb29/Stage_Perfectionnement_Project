<template>
    <div class="d-flex p-3 m-4 justify-content-center">   
    <div class="col-xl-10 col-md-12 col-lg-12">
          <div class="row shadow-lg rounded">
                <div class="col-lg-6 d-none d-lg-block bg-secondary">
                    <img src="../../assets/login.jpg" width="100%" height="100%" alt="">
                </div>
                <div class=" col-lg-6 py-5" >
                      <div class="text-center">
                        <h1 class="h4 text-gray-900 mb-5">Welcome Back !</h1>

                     
                      
                      </div>
                    <form @submit.prevent="SignIn()">


                     


                      <div class="mb-4">
                          <input  type="text" placeholder="Entrer Email Address..." name="email" class="form-control rounded-pill p-4 " v-model="email" id="exampleInputEmail1">
                        
                          
                      </div>
                      <div class="mb-5">
                         <input type="password" placeholder="Password" name="password"  class="form-control rounded-pill p-4 " v-model="password" id="exampleInputPassword1">
                         
                      </div>
                          <button style="font-size:19px" type="submit" name="submit" class="btn btn-primary btn-block w-100 rounded-pill">Login</button>
                      </form>
                      <hr>
                      <div class="fin text-center py-4 mb-1">
                              <a  href="../forgetpassword">Forget Password ?</a>
                       </div>
                       <div class="fin text-center">
                              <a href="../signup">Create an Account !</a>
                      </div> 
                </div>
          </div>
    </div>
</div>
</template>
<script>
import LoginService from "@/service/login_service/LoginService";
import {AuthStore} from "../../store/index";
export default {
    created() { },
    setup(){
      const store=AuthStore();
      return{store}
    },
    data() {
        return {
           
            email: "",
            password: "",
           
        };
    },
    methods:{
      SignIn() {
      LoginService.signInUser(this.email, this.password).then(() => {
        if (this.store.getisadmin == 1) {
          this.$router.push({name:"DashboardAdmin"});
        } else {
          this.$router.push('/');
        }
      }).catch((error) => {
        console.log(error);
      })
    },
    }
  }
</script>