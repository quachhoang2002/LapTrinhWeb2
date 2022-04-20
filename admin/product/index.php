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
    
     require('../../connect.php');
     $sql="select* from product
     join manufacture on manufacture.Ma=product.manufacture_id
     ";
     $result=mysqli_query($connect,$sql);
     ?>
     <a href="insert.php">addproduct</a>;
     <table border="1" > 
   <tr>
       <td>Name</td>
       <td> Price </td>
       <td> Image</td>
       <td> Description</td>
       <td> manufacture</td>
       <td>Change</td>
       <td>Delete</td>
   </tr> 
   
   <?php foreach($result as $value) { ?>
      <tr>
        <td><?php  echo $value['Name'] ?> </td>
        <td> <?php  echo $value['Price'] ?>   </td>
        <td> <img height="100px" src=" photos/<?php  echo $value['Image'] ?>" alt="">  </td>
        <td> <?php  echo $value['description'] ?> </td>
        <td><?php  echo $value['name'] ?>  </td>
         <td>Change</td>
         <td>Delete</td>
      </tr> 
   

   <?php }   ?>
     </table>
</body>
</html> 