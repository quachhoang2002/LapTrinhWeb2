<?php 
session_start();
     require('../connect.php');
     $name=$_POST['name'];
     $address=$_POST['address'];
     $phone=$_POST['phone'];
     $total=$_POST['total'];
     $customer_id=$_SESSION['id'];
  
     mysqli_query($connect,"insert into orders(customer_id,name_receiver,phone_receiver,address_receiver,total_price) values($customer_id,'$name','$address','$phone',$total)");
   
     $item=mysqli_query($connect,"select product_id,quantity from cart where user_id=$customer_id");
  
     $getOrderId=mysqli_query($connect,"select max(id) from orders where customer_id =$customer_id"); 
     $orderID=mysqli_fetch_array($getOrderId)['max(id)'];

     while($row = mysqli_fetch_assoc($item)){
               $product_id=$row['product_id'];
               $quantity=$row['quantity'];
               mysqli_query($connect, "insert into order_detail(order_id,product_id,quantity) values($orderID,$product_id,$quantity)" );
             
     }

     mysqli_query($connect,"delete from cart where user_id='$customer_id' ");
     header("location:index.php");
   

     
    

   
    
