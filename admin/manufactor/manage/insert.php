<?php  session_start() ?>
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

   if(isset($_SESSION['error'])){
   echo $_SESSION['error'];
   }     
   if(isset($_SESSION['succes'])){
     echo $_SESSION['succces'];
   }
   
 
    ?> 
    <form action="process.php?action=insert" method="POST" >  
  
    TEN <input type="text" name="name" id="name">
    PHONE <input type="text" name="phone">
    IMAGE <input type="text" name="image">
    <button> addproduct</button>

  </form>


</body>
</html>