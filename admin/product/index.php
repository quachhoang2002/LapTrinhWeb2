<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="../../jquery-3.6.0.min.js"></script>
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
         <td>  <input type="button" value="sua" onclick="Update(<?php echo $value['id']?>)" ></td>
         <td >  <input type="button" value="xoa"onclick="Delete(<?php echo $value['id']?>)"> </td>
         
      </tr> 
   

   <?php }   ?>
     </table>
    <div id="update">

    </div>

</body> 
   <script type="text/javascript">
        function Delete(id){
                  $.ajax({
                    url:'process.php?action=delete',
                    method:'POST',
                    data:{id:id },
                    success:function(data){
                      alert('xoa thanh cong ')
                    }

                  })
                }
        function Update(id){
             $('#update').load('update-form.php',{id:id})

        }
     
   </script>
</html> 