<?php 
 if( empty($_POST['name']) || empty($_POST['phone']) || empty($_POST['image'])   ){
header('location:insert.php?loi=FillName');
exit;

  }

$name=$_POST['name'];
  $phone=$_POST['phone'];
  $image=$_POST['image'];
include('../../connect.php');
$sql="insert into manufacture(name,phone,image) values('$name','$phone','$image')";

 $error= mysqli_error($connect);
 echo $error;
 session_start();
 mysqli_query($connect,$sql);
 $_SESSION['success']='Thanh Cong';
 header('location:../index.php');
 mysqli_close($connect);