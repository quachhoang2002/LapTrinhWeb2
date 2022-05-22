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
    <link rel="stylesheet" href="../font/themify-icons/themify-icons.css">
    <script src="../bootstrap-5.1.3-dist/js/bootstrap.min.js"></script>
    <script   src="../jquery-3.6.0.min.js"></script>
</head>
<?php  
    if(isset($_COOKIE['remember'])){
        require '../connect.php';
        $id=$_COOKIE['remember'];
        $result=mysqli_query($connect,"select* from user where id=$id");
        $row=mysqli_fetch_array($result);
        $_SESSION['id'] = $row['id'];
        $_SESSION['fullname']=$row['fullname'];
        $_SESSION['avatar']=$row['image'];
        header('location:../User');   
    }
    if(isset($_SESSION['id'])){
      header('location:../User');              
     }
 ?>
<body >

  <header style="background-color: #edfafd;height:75px;" class="container-fluid d-flex justify-content-around  ">
     <a href="../User/" class="align-self-center text-decoration-none" style="font-size:35px;color:#403019"> KKH Shop</a>
     <a href="" class="align-self-center text-decoration-none" style="color:#403019"> Ban Can Giup Do ?</a>    
  </header>

 <section class="vh-50 gradient-custom">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-8 col-lg-6 col-xl-5">
          <div class="card bg-dark text-white" style="border-radius: 1rem;">
            <div class="card-body p-5 text-center">
  
              <div class="mb-md-5 mt-md-4 pb-5">
                 
                <h2 class="fw-bold mb-2 text-uppercase">Login</h2>
                <p class="text-white-50 mb-5">Please enter your login and password!</p>
 
                  <form action="process.php?action=login" method="POST">        
                      <div class="form-outline form-white mb-4">
                       <label class="form-label" for="Username">Username</label>
                       <input type="text" name="username" id="Username" class="form-control form-control-lg" placeholder="Username" required />  
                     </div>
       
                     <div class="form-outline form-white mb-4">
                       <label class="form-label" for="typePasswordX">Password</label>
                       <input type="password" name="password" id="typePasswordX" class="form-control form-control-lg"   placeholder="password" required />
                     </div>
                     Ghi nho dang nhap <input type="checkbox" name="remember">
                    <br>
                     <?php if(isset($_SESSION['error'])) : ?>
                       <span class="text-danger"> <?php echo $_SESSION['error'];unset($_SESSION['error']) ?> </span>
                     <?php  endif ?>

                     <p class="small mb-5 pb-lg-2"><a class="text-white-50" href="#!">Forgot password?</a></p>   
                     <button class="btn btn-outline-light btn-lg px-5" type="submit">Login</button>
                  </form>
                
              </div>
                

               <div>               
                <p class="mb-0">Don't have an account? 
                  <a href="register-form.php" class="text-white-50 fw-bold">  Dang Ky</a>
                </p>
              </div>
         
  
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <?php require '../User/footer.php' ?>


</body>
</html> 
