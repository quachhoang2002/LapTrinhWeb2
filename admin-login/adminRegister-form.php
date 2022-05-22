

  
<section class="vh-100" >
  <div class="container h-100" >
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-lg-12 col-xl-11">
        <div class="card text-black" style="border-radius: 25px;">
          <div class="card-body p-md-5">
            <div class="row justify-content-center">
              <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Sign up</p>

                <form class="mx-1 mx-md-4" action="../admin-login/adminRegister-process.php" method="POST" onsubmit="return validate()">

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-info fa-solid fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <label class="form-label" for="form3Example1c">Your Name</label>
                      <input type="text" id="form3Example1c" class="form-control"  name="fullname" required />          
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-phone fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <label class="form-label" for="form3Example1c">Your Phone</label>
                      <input type="text" id="form3Example1c" class="form-control"  name="phone" required />            
                    </div>
                  </div>
                  

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <label class="form-label" for="form3Example3c">Username</label>
                      <input type="text" id="form3Example3c" class="form-control" type="text" name="username"  required/>
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <label class="form-label" for="form3Example4c">Password</label>
                      <input type="password" id="form3Example4c" class="form-control"  name="password" required />
                    </div>
                  </div>
                  

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <label class="form-label" for="form3Example4cd">Repeat your password</label>
                      <input type="password" id="form3Example4cd" class="form-control" name="password-2" required />
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-id-card fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                    <label class="form-label" for="form3Example4cd">Chuc vu</label>
                    <select name="level" id="">
                     <option value="0">Nhan vien  </option>
                     <option value="1">Quan Ly </option>
                    </select>                   
                    </div>
                  </div>

              
                  <div id="errorPW" class="text-danger">

                  </div>
                  
                  <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                    <button type="submit" class="btn btn-primary btn-lg">Register</button>
                  </div>

                </form>

              </div>
           
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

</body>
<script>
         function validate(){     

        var password_1=document.getElementsByName('password')[0].value;
        var password_2=document.getElementsByName('password-2')[0].value;
      

             if (password_1 != password_2){
              document.getElementById('errorPW').innerHTML=" khong trung mat khau"
               return false;
             }     
       }
</script>
</html>