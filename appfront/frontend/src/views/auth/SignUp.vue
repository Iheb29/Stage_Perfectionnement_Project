<template>
  <div class="d-flex p-3 m-4 justify-content-center">
    <div class="col-xl-10 col-md-12 col-lg-12">
      <div class="row shadow-lg rounded">
        <div class="col-lg-6 d-none d-lg-block bg-secondary">
          <img
            src="../../assets/signup.png"
            width="100%"
            height="100%"
            alt=""
          />
        </div>
        <div class="col-lg-6 py-5">
          <div class="text-center">
            <h1 class="h4 text-gray-900 mb-5">Welcome !</h1>
          </div>

          <form @submit.prevent="Register()" enctype="multipart/form-data">
            <div class="mb-4">
              <input
                type="text"
                placeholder="Name..."
                v-model="nom"
                class="form-control rounded-pill p-4"
                id="exampleInputNom"
              />
            </div>
            <div class="mb-4">
              <input
                type="text"
                placeholder="LastName..."
                v-model="prenom"
                class="form-control rounded-pill p-4"
                id="exampleInputPrenom"
              />
            </div>
            <div class="mb-4">
              <input
                type="text"
                placeholder="Email Address..."
                v-model="email"
                class="form-control rounded-pill p-4"
                id="exampleInputEmail1"
              />
            </div>
            <div class="mb-4">
              <input
                type="password"
                placeholder="Password"
                v-model="password"
                class="form-control rounded-pill p-4"
                id="exampleInputPassword1"
              />
            </div>
            <div class="mb-5">
              <input
                type="text"
                placeholder=" Phone Number..."
                v-model="num_tlf"
                class="form-control rounded-pill p-4"
                id="exampleInputEmail1"
              />
            </div>
            <div>
              <input type="file" ref="photo" @change="UploadPhoto" />
            </div>
            <button
              style="font-size: 19px"
              type="submit"
              name="submit"
              class="btn btn-primary btn-block w-100 rounded-pill"
            >
              Sign up
            </button>
          </form>
          <hr />
          <div class="fin text-center" >
              <RouterLink to="/signin">   login ! </RouterLink>    
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import UserService from "@/service/user_service/UserService";
export default {
    created() { },
    data() {
        return {
            nom: "",
            prenom: "",
            email: "",
            password: "",
            num_tlf: "",
            image: "",
        };
    },
    methods: {
        UploadPhoto() {
            this.image = this.$refs.photo.files[0];
        },
        Register() {
            UserService.AddUser({
                nom:this.nom,
prenom:this.prenom,
email:this.email,
password:this.password,
num_tlf:this.num_tlf,
image:this.image
            }).then((res)=>{
                this.$router.push({name:"signin"});
            })
        }
    },
    components: {  }
};
</script>
