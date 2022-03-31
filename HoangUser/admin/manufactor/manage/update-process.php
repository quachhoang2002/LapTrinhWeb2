<?php 



$ma=$_POST['ma'];
$name=$_POST['name'];
$phone=$_POST['phone'];
$image=$_POST['image'];

if(empty($name)||empty($phone)||empty($image)){
    header("location:update-form.php?ma=$ma&loi='Fill' ");
   
    exit;
}


require('../../connect.php');
 $sql=" update manufacture
    set 
  name='$name',
  phone='$phone',
  image='$image'
  where Ma=$ma ;
 
 ";

 $error=mysqli_error($connect);
 echo $error;
 session_start();
  mysqli_query($connect,$sql);
  header("location:../index.php");          
  $_SESSION['success']='SUCCESS';
  