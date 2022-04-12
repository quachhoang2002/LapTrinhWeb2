<!DOCTYPE html>
<html lang="en">
<head>
       <meta charset="UTF-8">
       <meta http-equiv="X-UA-Compatible" content="IE=edge">
       <meta name="viewport" content="width=device-width, initial-scale=1.0">
       <title>Document</title>
</head>
<?php 
     require('../connect.php');
     $id=$_GET['id'];
     $result =mysqli_query($connect,"select * from cart where user_id=$id");
     $result_total= mysqli_query($connect,"select sum(price*quantity) as tong from cart where user_id=$id");
       $total=mysqli_fetch_array($result_total)['tong'];
     
     
?>
<body>
       <a href="cart.php"> Gio Hang</a>
 <table border="1">
        <tr>
               <td>Hinh Anh</td>
               <td>Ten</td>
               <td>So Luong</td>
               <td>Gia</td>
               
        </tr>

        
       <?php foreach($result as $each){?>
         <tr>
                <td><img src="../admin/product/photos/<?php echo $each['image'] ?>" alt="" style="height: 100px;"></td>
                <td><?php echo $each['product_name'] ?></td>
                <td><?php echo $each['quantity'] ?></td>
                <td><?php echo $each['price']*$each['quantity'] ?></td>
                
         </tr> 
        <?php   }?>
        <tr>
             <td colspan="4" style="text-align: center;" > Tong Tien :<?php echo $total ?></td>
       </tr>
  
 </table>   
  <form action="order-process.php" method="POST">
         <input type="hidden" value="<?php echo $_SESSION['id']  ?>">
      Name recive<input type="text" name="name"> 
     <br>
      Address recive<input type="text" name="address"> 
      <br>
     Phone recive<input type="text" name="phone"> 
     <br>
     <input type="hidden" name="total" value="<?php echo $total ?>">
     
         <button> Thanh Toan</button>
  </form>


</body>
</html>