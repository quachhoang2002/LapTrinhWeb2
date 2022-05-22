<?php 
session_start();
$username=$_POST['username'];
$password=$_POST['password'];

require '../connect.php';
$result=mysqli_query($connect,"select *from admin where username='$username' and password=PASSWORD('$password')  ");
$getItem=mysqli_fetch_array($result);



if(mysqli_num_rows($result)==1 && $getItem['status']==0){
    
    $_SESSION['adminName']=$getItem['fullname'];
    $_SESSION['adminID']=$getItem['id'];
    $_SESSION['level']=$getItem['level'];
    header('location:../admin');   
} 
else if($getItem['status']==1){
    header("location:adminLogin-form.php");
    $_SESSION['error']="Tai khoan da bi khoa";
    exit;
}


else {
     header("location:adminLogin-form.php");
     $_SESSION['error']="sai tai khoan hoac mat khau ";
     exit;
    
} 
