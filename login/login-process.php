<?php 
$username=$_POST['username'];
$password=$_POST['password'];


if(isset($_POST['remember'])){
   $remember= true;
}
else $remember= false;




require '../HoangUser/admin/connect.php';
$result=mysqli_query($connect,"select *from user where username='$username' and password='$password' ");
$getItem=mysqli_fetch_array($result);
if(mysqli_num_rows($result)==1){
    session_start();
    $_SESSION['fullname']=$getItem['fullname'];
    $_SESSION['id']=$getItem['id'];
    header("location:../HoangUser/admin/manufactor");
    

    if($remember){
        setcookie('remember', $getItem['id'] ,time() + (86400 * 5));
        
      
    }
  
     
} 



else {
     header("location:login-form.php");
     session_start();
     $_SESSION['error']="sai tai khoan hoac mat khau ";
     exit;
    
} 
