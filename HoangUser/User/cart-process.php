<?php 


session_start() ;
  
if(empty($_SESSION['id'])){
  header('location:../../login/login-form.php');
  exit;
 }

  $product_id=$_POST['id'];
  $quantity=$_POST['quantity'] ;
  $name=$_POST['name'] ;
  $price=$_POST['price'] ;
  $image=$_POST['image'] ;
  $user_id=$_POST['user_id'];
  require('../admin/connect.php');
  $sql=" 
  insert into cart(product_name,price,image,product_id,quantity,user_id) 
  values ('$name',$price,'$image',$product_id,$quantity,$user_id)
  ";
  
  mysqli_query($connect,$sql);
  mysqli_error($connect);
  
  header('location:index.php')



?>