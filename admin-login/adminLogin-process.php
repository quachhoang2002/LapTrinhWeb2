<?php 
session_start();
$username=$_POST['username'];
$password=$_POST['password'];

require '../connect.php';
$result=mysqli_query($connect,"select *from admin where username='$username' and password=PASSWORD('$password')  ");
$getItem=mysqli_fetch_array($result);

if($getItem['level']==1){
    $_SESSION['level']='SuperAdmin';
}

if(mysqli_num_rows($result)==1){
    
    $_SESSION['adminName']=$getItem['fullname'];
    $_SESSION['adminID']=$getItem['id'];
    $_SESSION['level']=$getItem['level'];
    $_SESSION['success']='Dang Nhap thanh cong';
  header('location:../admin'); 
     
} 



else {
     header("location:adminLogin-form.php");
     
     $_SESSION['error']="sai tai khoan hoac mat khau ";
     exit;
    
} 
