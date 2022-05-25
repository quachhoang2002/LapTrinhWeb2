<?php 
  
   $action=$_GET['action'];
   require '../../connect.php';
   switch($action){
      case "approve": 
         $id=$_POST['id'];
         mysqli_query($connect,"update orders set status=1 where id=$id ");
         break;
      case "reject": 
         $id=$_POST['id'];
         mysqli_query($connect,"update orders set status=2 where id=$id");
         break;
      case "ShowDetail":
         $id=$_POST['id'];
         $result=mysqli_query($connect,"select * from order_detail JOIN product on product.id = order_detail.product_id where order_id=$id");  
         $ouput='';
       
           foreach($result as $each){
                $ouput.= ' 
                <tr>
                  <td>'.$each['Name'].'</td>
                  <td>'.$each['quantity'].'</td>
                 </tr>
               ';
            }   
          
          echo $ouput;           
          break;  
      default :
       echo "bip nhau a";   
   }

?> 