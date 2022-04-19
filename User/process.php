<?php 


session_start() ;
   


if(empty($_SESSION['id'])){
  header('location:../login/login-form.php');
  exit;
 }
 require('../connect.php');
 $action=$_GET['action'];

 
 
  switch($action){
     case "addtocart": 
         
         $quantity=$_POST['quantity'] ;
         $name=$_POST['name'] ;
         $price=$_POST['price'] ;
         $image=$_POST['image'] ;
         $user_id=$_POST['user_id'];
         $product_id=$_POST['id'];

         $result=mysqli_query($connect,"select*from cart where product_id=$product_id and user_id=$user_id");
         $row=mysqli_num_rows($result);        
        if($row<1){
           $sql=" 
               insert into cart(product_name,price,image,product_id,quantity,user_id) 
               values ('$name',$price,'$image',$product_id,$quantity,$user_id)  "; 
           mysqli_query($connect,$sql);              
         } 
        else {
             mysqli_query($connect,"update cart set quantity=quantity+$quantity where product_id=$product_id and user_id=$user_id");
      
         } 
         break;

     case "delete":
         $id=$_POST['id'];
         require('../connect.php'); 
         mysqli_query($connect,"delete from cart where id=$id") ; 
         break;

      
     case "update":
          $id=$_POST['id'];
          $quantity=$_POST['quantity'];
          mysqli_query($connect,"update cart set quantity=$quantity where id=$id");
          mysqli_query($connect,"delete from cart where quantity<=0");
          break;
     
     case "order":
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
          break;
     case "CancelBill":
          $id=$_POST['id'];
          mysqli_query($connect,"update orders set status=2 where id=$id");
          mysqli_close($connect);
          break;
      case "ShowDetail":
           $id=$_POST['id'];
           $result=mysqli_query($connect,"select * from order_detail JOIN product on product.id = order_detail.product_id where order_id=$id");  
           $ouput ='<table border=1>';
            $ouput.=' 
               <tr>
                  <td> San Pham </td>
                  <td> So Luong </td>
              </tr>
                ';
             foreach($result as $each){
                  $ouput.= ' 
                  <tr>
                    <td>'.$each['Name'].'</td>
                    <td>'.$each['quantity'].'</td>
                   </tr>
                 ';
             }   
             $ouput.='</table> <button onclick="remove()">remove</button>';
            echo $ouput;
            
            break;
       

      default: 
       echo "khong co cai gi dau ";
          
  }  
  
?> 
<script src="index.php"></script>