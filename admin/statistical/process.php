<?php 
  // $action=$_GET['action'];
  // require '../../connect.php';
  
  // switch($action){
  //      case 'product_statistics':
  //           $time1=$_POST['time1'];
  //           $time2=$_POST['time2'];
  //           $result= mysqli_query($connect,"select product.id,product.Name,ifnull(sum(order_detail.quantity),0) as quantitySale 
  //           from product 
  //           LEFT JOIN order_detail on order_detail.product_id=product.id
  //           LEFT JOIN orders on orders.id = order_detail.order_id 
  //           where orders.time between '$time1' and '$time2'
  //           Group By product.id
  //           ORDER BY quantitySale DESC
  //          "); 
  //           $output='<table border=1>
  //           <tr> 
  //             <td> Id</td>
  //             <td> Ten</td>
  //             <td> So Luong</td>
  //          </tr> ';
  //           foreach($result as $each){
  //                $output.='<tr> 
  //                <td>'.$each['id'].'</td>
  //                <td>'.$each['Name'].'</td>
  //                <td>'.$each['quantitySale'].'</td>
  //             </tr> ';
  //           } 
  //           $output.="</table>";
  //          echo $output;
  //          break;
           
        // case 'sales':  
          $start=1;
          $end=12; 
           
          
           while ($start <= $end){
              $result[]= date('Y-'.$start.'-d');
              $start++;
              
           }
          foreach($result as $each){
            echo $each;
            echo '</br>';
          }
        $a=json_encode($result); 
        echo var_dump($a);

  // } 
   


?>  