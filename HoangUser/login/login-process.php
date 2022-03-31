<?php 
$username=$_POST['username'];
$password=$_POST['password'];
$rememeber=$_POST['remmember'];

if(isset($rememeber)){
    $rememeber=true;
}
else $rememeber=false;




require '../admin/connect.php';
$result=mysqli_query($connect,"select *from user where username='$username' and password='$password' ");
$getItem=mysqli_fetch_array($result);
if(mysqli_num_rows($result)==1){
    session_start();
    $_SESSION['username']=$username;
    header("location:../admin/manufactor");

    if($rememeber){
        setcookie($remember,$getItem['key'],time()+(86400 * 5));
        
    }
     
} 


else {
     header("location:login-form.php");
     session_start();
     $_SESSION['error']="sai tai khoan hoac mat khau ";
    
} 
