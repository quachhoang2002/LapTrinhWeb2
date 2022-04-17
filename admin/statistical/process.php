<?php 
  $action=$_GET['action'];
  require '../../connect.php';
  
  switch($action){
       case 'product_statistics':
            $result= mysqli_query($connect,"select product.id,product.Name,ifnull(sum(order_detail.quantity),0) as quantitySale 
            from product 
            LEFT JOIN order_detail on order_detail.product_id=product.id
            LEFT JOIN orders on orders.id = order_detail.order_id
            Group By product.id
            ORDER BY quantitySale DESC
           ");
            $output='<tr> 
              <td> Id</td>
              <td> Ten</td>
              <td> So Luong</td>
           </tr> ';
            foreach($result as $each){
                 $output.='<tr> 
                 <td>'.$each['id'].'</td>
                 <td>'.$each['Name'].'</td>
                 <td>'.$each['quantitySale'].'</td>
              </tr> ';
            }
           echo $output;
  }

?>  