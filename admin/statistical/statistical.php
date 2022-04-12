<?php 
  require '../../connect.php';
 $result= mysqli_query($connect,"select product.id,product.Name,
  (   
      SELECT 
      ifnull(SUM(order_detail.quantity),0)
      FROM order_detail 
      WHERE order_detail.product_id=product.id and order_detail.order_id=(SELECT orders.id from orders where orders.status=1)
  ) as quantitySale from product GROUP BY product.id ")

?> 
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body> 
  <table border="1">
   <tr>
     <td>ID</td>
     <td>TEN</td>
     <td>SL</td>
   </tr>  
  
  <?php foreach($result as $each){?>
      <tr>
        <td><?php echo $each['id'] ?></td>
        <td> <?php echo $each['Name'] ?></td>
        <td> <?php echo $each['quantitySale'] ?></td>
      </tr>
 <?php } ?>
 </table>
</body>
</html>