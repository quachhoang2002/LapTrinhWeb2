 <?php session_start() ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../bootstrap-5.1.3-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="font/themify-icons/themify-icons.css">
    <script src="../bootstrap-5.1.3-dist/js/bootstrap.min.js"></script>
    <script   src="../jquery-3.6.0.min.js"></script>
</head>
<body>  

<header style="background-color: #edfafd;height:75px;" class="container-fluid d-flex justify-content-around  ">
   <a href="../User/" class="align-self-center text-decoration-none" style="font-size:35px;color:#403019"> KKH Shop</a>
   <a href="" class="align-self-center text-decoration-none" style="color:#403019"> Ban Can Giup Do ?</a>    
</header>

<section class="vh-50 gradient-custom">
  <div class="container py-5 h-100">
    <div class="row justify-content-center align-items-center h-100">
      <div class="col-12 col-lg-9 col-xl-7">
        <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
          <div class="card-body p-4 p-md-5">
            <h3 class="mb-4 pb-2 pb-md-0 mb-md-5">Registration Form</h3>

            <form action="process.php?action=register" method="POST"  onsubmit="return validate()" >
              <div class="row">
                <div class="col-md-8 mb-4">
                  <div class="form-outline">
                     <label class="form-label" >Ho Ten</label>
                     <input type="text" class="form-control " name="name"  value="<?php if(isset($_SESSION['name']))   
                      echo $_SESSION['name'];
                      unset($_SESSION['name']); ?>" pattern="^[a-zA-Z]+(([',. -][a-zA-Z ])?[a-zA-Z]*)*$"  required>
                         <span class="text-danger" id="errorName"> </span>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-8 mb-4">
                  <div class="form-outline">
                     <label class="form-label" >Ten Dang Nhap</label>
                     <input type="text" class="form-control " name="Username" pattern=".{5,}" title="it nhat 5 ky tu" value="<?php if(isset($_SESSION['username']))   
                      echo $_SESSION['username'];
                      unset($_SESSION['username']);  ?>" required>
                         <span class="text-danger" id="errorUserName"> </span>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-6 mb-4 d-flex align-items-center">
                  <div class="form-outline datepicker w-100">
                    <label class="form-label">Mat Khau</label>
                    <input type="password" class="form-control " name="password-1" title="can it nhat 1 chu so , 1 chu in hoa ,1 chu in thuong va do dai it nhat la 8"
                                                                                  pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required>
                         <span  class="text-danger" class="errorPw"> </span>
                  </div>
                </div>
                <div class="col-md-6 mb-4">
                  <div class="form-outline datepicker w-100">
                    <label class="form-label">Nhap lai mat khau</label>
                    <input type="password" class="form-control " name="password-2" required >
                         <span class="text-danger"  class="errorPw"> </span>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-6 mb-4 pb-2">
                  <div class="form-outline">
                    <label class="form-label" >Email</label>
                    <input type="email" class="form-control " name="email" value="<?php if(isset($_SESSION['email']))   
                      echo $_SESSION['email'];
                      unset($_SESSION['email']);  ?>"   pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required>
                         <span class="text-danger" id="errorEmail"> </span>
                  </div>
                </div>
                <div class="col-md-6 mb-4 pb-2">
                  <div class="form-outline">
                     <label class="form-label" >Phone Number</label>
                     <input type="text" class="form-control " name="phone" value="<?php if(isset($_SESSION['phone']))   
                      echo $_SESSION['phone'];
                      unset($_SESSION['phone']);  ?>"  pattern="[0]{1}[0-9]{9}"   title="Phai bat dau bang so 0" required>
                         <span class="text-danger" id="errorPhone"> </span>
                  </div>
                </div>
              </div> 
                         <?php  if(isset($_SESSION['error'])) : ?>  
                      <span class="text-danger text-center">  <?php echo $_SESSION['error'];   
                              unset($_SESSION['error']); ?> 
                      </span> 
                           <?php endif  ?> 
                  <span class="text-danger text-center" id="errorPW"></span>
                 <div class="d-flex justify-content-center">
                   <button   class="btn btn-success btn-block btn-lg gradient-custom-4 text-body">Register</button>
                </div>              
            </form>
            
                
                 <p class="text-center text-muted mt-5 mb-0">Have already an account? <a href="login-form.php"
                    class="fw-bold text-body"><u>Login here</u></a></p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<?php require '../User/footer.php' ?>
    
</body>
<script> 
       
  
       function validate(){
        
 
      

        var password_1=document.getElementsByName('password-1')[0].value;
        var password_2=document.getElementsByName('password-2')[0].value;
        


             if (password_1 != password_2){
              document.getElementById('errorPW').innerHTML=" khong trung mat khau"
               return false;
             }

           
       }
    
 
    
</script>
</html>