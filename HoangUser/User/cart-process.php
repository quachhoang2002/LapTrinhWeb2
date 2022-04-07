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
 
  
  $result=mysqli_query($connect,"select*from cart where product_id=$product_id and user_id=$user_id");
  $row=mysqli_num_rows($result);
  
  mysqli_error($connect);
   
 if($row<1){
      $sql=" 
     insert into cart(product_name,price,image,product_id,quantity,user_id) 
     values ('$name',$price,'$image',$product_id,$quantity,$user_id)  "; 
      mysqli_query($connect,$sql);
    
     
 } 
 else {
     mysqli_query($connect,"update cart set quantity=quantity+$quantity where product_id=$product_id and user_id=$user_id");
  
 }

  



?>