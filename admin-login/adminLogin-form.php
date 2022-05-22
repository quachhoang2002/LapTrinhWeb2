
<?php  session_start() ;
     if(isset($_SESSION['level'])){
        header('location:../admin');              
       }
?>
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
    <script src="../bootstrap-5.1.3-dist/js/bootstrap.bundle.min.js"></script>
    <script   src="../jquery-3.6.0.min.js"></script>
</head>
<body> 
  
    <div class="container-fluid d-flex justify-content-center align-items-center vh-100 gradient-custom-2">
     <div class="card p-2 gradient-custom" style="height: 300px; width: 300px;" >
      <div class="card-header">
        ADMIN LOGIN
      </div class="card-body  ">
        <form action="adminLogin-process.php" method="POST" >
         <label for="" class="form-label">Username</label>
         <input type="text" name="username" class="form-control"/>
       
         <label for="" class="form-label">Password</label>
         <input type="password" name="password" class="form-control"/>
   
         <button class="btn btn-primary mt-3 me-2 float-end ">Login </button>
         <?php if(isset($_SESSION['error'])) : ?>
              <span class="text-danger"> <?php echo $_SESSION['error'];unset($_SESSION['error']) ?> </span>
          <?php  endif ?>
       </form>
     </div>
    </div>

    
</body>
</html>