<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<?php  
 
 if(isset($_SESSION['username'])){
     header('location:../admin/manufactor');
 }
if(isset($_COOKIE['remember'])){
    require '../admin/connect.php';
    $key=$_COOKIE['remember'];
    $result=mysqli_query($connect,"select*from user where key=$key");
    $row=mysqli_fetch_array($result);
    // $error=mysqli_error($connect);
    // echo $error;
    $_SESSION['username']=$row['username'];
    $_SESSION['password']=$row['password'];

}

 ?>
<body>
    <a href="register-form.php">Dang Ky</a>
      <form action="login-process.php" method="POST">
         Ten dang nhap <input type="text" name="username" value="<?php if(isset($_SESSION['username'])) echo $_SESSION['username']?>"> 
         Mat khau <input type="password" name="password" value="<?php if(isset($_SESSION['password'])) echo $_SESSION['password'] ?>">
         Ghi nho dang nhap <input type="checkbox" name="remember">
         <button>dang nhap </button>
         <?php if(isset($_SESSION['error'])){
             echo $_SESSION['error'];
             unset($_SESSION['error']);
         } 
         
         
         ?>


      </form>


</body>
</html>