<template>
    <div class="d-flex p-3 m-4 justify-content-center">   
    <div class="col-xl-10 col-md-12 col-lg-12">
          <div class="row shadow-lg rounded">
                <div class="col-lg-6 d-none d-lg-block bg-secondary">
                    <img src="../../assets/signup.png"  width="100%" height="100%" alt="">
                </div>
                <div class=" col-lg-6 py-5">
                      <div class="text-center">
                        <h1 class="h4 text-gray-900 mb-5">Welcome !</h1>
                      </div>
                      
                    <form action="index.php" method="POST" enctype="multipart/form-data">
                       
                     <div class="mb-4">
                          <input  type="text" placeholder="Name..." name="nom" class="form-control rounded-pill p-4 " id="exampleInputNom">
                          
                      </div>
                      <div class="mb-4">
                          <input  type="text" placeholder="LastName..." name="prenom" class="form-control rounded-pill p-4 "  id="exampleInputPrenom">
                          
                      </div>
                      <div class="mb-4">
                          <input  type="text" placeholder="Entrer Email Address..." name="email" class="form-control rounded-pill p-4 " id="exampleInputEmail1">
                          
                      </div>
                      <div class="mb-4">
                         <input type="password" placeholder="Password" name="password" class="form-control rounded-pill p-4 " id="exampleInputPassword1">
                      </div>
                      <div class="mb-5">
                          <input  type="text" placeholder="Entrer Number Phone..." name="tlf_num" class="form-control rounded-pill p-4 " id="exampleInputEmail1">
                      </div>
                      <div>
                        <input type="file" name="photo" >
                      </div>
                          <button style="font-size:19px" type="submit" name="submit" class="btn btn-primary btn-block w-100 rounded-pill">Sign up</button>

                      </form>
                      <hr>
                       <div class="fin text-center">
                              <a href="../login/index.php">login !</a>
                      </div> 
                </div>
          </div>
    </div>
</div>
</template>