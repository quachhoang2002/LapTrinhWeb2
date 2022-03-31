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
    $ma=$_GET['ma'];
    require('../../connect.php');
    $sql="select* from manufacture where Ma=$ma";
    $result=mysqli_query($connect,$sql);
    $item=mysqli_fetch_array($result);
    $error='';
    if(isset($_GET['loi'])){
      $error=$_GET['loi']; 
    ?>  
     <span style="color: red;"> <?php echo $error ?> </span> 
    <?php  
    } 
    ?>
    

  
<form action="update-process.php" method="POST" >  
   <input type="hidden" name="ma" value="<?php echo $item['Ma'] ?>">
  TEN <input type="text" name="name" value="<?php echo $item['name'] ?>"> 
  PHONE <input type="text" name="phone" value="<?php echo $item['phone'] ?>">
  IMAGE <input type="text" name="image" value="<?php echo $item['image'] ?>">
  <button> Sua</button>

</form>
</body>
</html>

 
 
