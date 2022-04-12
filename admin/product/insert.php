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
      $sql="select* from manufacture 
                           ";
      $manufactor=mysqli_query($connect,$sql);
      
    ?>
    <form action="process.php" method="POST" enctype="multipart/form-data" >
 
    
    Name <input type="text" name="name"> 
    <br>
    Price <input type="number" name="price">
    <br>
    Image <input type="file" name="image">
    <br>
    Description <input type="text" name="description"> 
    <br>
    Manufacture 
    <select name="manufacture_id" id="">
         <?php foreach($manufactor as $manufacture){?>
      <option value="<?php echo $manufacture['Ma']?>"> <?php echo $manufacture['name'] ?> </option>
          <?php
         } ?>   

       
    </select>
    <br>
    <button>submit </button>
       



    </form>
    
</body>
</html>