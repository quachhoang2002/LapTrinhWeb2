<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
  <?php 
       require '../../connect.php';
        $result=mysqli_query($connect,"select *from orders where status=1 order by time DESC");
      ?> 
<body>
     <table border="1">
       <tr>
         <td>id</td>
         <td>customer_id</td>
         <td>Name</td>
         <td>Phone</td>
         <td>Address</td>
         <td>time</td>
         <td>total price</td>
         <td>status</td>
       </tr>      
         
       <?php foreach($result as $each){?>
         <tr id="approve<?php echo $each['id']?>">
              <td> <?php echo $each['id'] ?> </td>
              <td>  <?php echo $each['customer_id'] ?>  </td>
              <td>   <?php echo $each['name_receiver'] ?>  </td>
              <td>   <?php echo $each['phone_receiver'] ?>  </td>
              <td>   <?php echo $each['address_receiver'] ?>  </td>
              <td>   <?php echo $each['time'] ?>  </td>
              <td>   <?php echo $each['total_price'] ?>  </td>
              <td>Approved</td>
             

            
         </tr>

     <?php } ?>
      </table>
</body>
</html>