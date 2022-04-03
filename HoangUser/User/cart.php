
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body> 
<?php 
     session_start();
       require('../admin/connect.php');
      $user_id=$_SESSION['id'];
      $result=mysqli_query($connect,"select * from cart where user_id=$user_id");
      $row=mysqli_num_rows($result);
      $result_total= mysqli_query($connect,"select sum(price*quantity) as tong from cart where user_id=$user_id");
       $total=mysqli_fetch_array($result_total)['tong'];
    
  ?> 
  
   <table border="1" >
         <?php foreach($result as $each){?>
            <tr>
                  <td> <?php echo $each['image'] ?>  </td>
                  <td> <?php echo $each['product_name'] ?> </td>
                  <td>  <?php echo $each['price'] ?> </td>
                  <td>  <?php echo $each['quantity'] ?> </td>
                  <td>  <?php echo $each['price']*$each['quantity'] ?> </td>


          </tr>
       <?php  } ?> 

   </table> 
  <?php echo $total ?>


</body>
</html>