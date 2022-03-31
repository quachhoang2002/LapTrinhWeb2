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
 

if(isset($_COOKIE['remember'])){
    require '../HoangUser/admin/connect.php';
    $id=$_COOKIE['remember'];
    $result=mysqli_query($connect,"select* from user where id=$id");
    $row=mysqli_fetch_array($result);
    // $error=mysqli_error($connect);
    // echo $error;
    $_SESSION['id'] = $row['id'];
    $_SESSION['fullname']=$row['fullname'];
  

}
if(isset($_SESSION['id'])){
    header('location:../HoangUser/admin/manufactor');

} 

 ?>
<body>
    <a href="register-form.php">Dang Ky</a>
      <form action="login-process.php" method="POST">
         Ten dang nhap <input type="text" name="username"> 
         Mat khau <input type="password" name="password" >
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