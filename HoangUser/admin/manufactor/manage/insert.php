<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body> 
     
     <a href="../index.php">Quan Ly</a>
     <br>
     
     <?php 

   if(isset($_GET['notice'])=='loi'){
   echo $_GET['notice'];
   }     
   else if(isset($_GET['notice'])=='succes'){
      echo $_GET['notice'];
    }  
   
 
    ?> 
    <form action="process.php" method="POST" >  
  
    TEN <input type="text" name="name" id="name">
    PHONE <input type="text" name="phone">
    IMAGE <input type="text" name="image">
    <button> addproduct</button>

  </form>


</body>
</html>