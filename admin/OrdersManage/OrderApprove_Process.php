<?php 
   require '../../connect.php';
  
   $action=$_GET['action'];

   switch($action){
      case "approve": 
         $id=$_POST['id'];
         mysqli_query($connect,"update orders set status=1 where id=$id");
         mysqli_close($connect);
      case "reject": 
         $id=$_POST['id'];
         mysqli_query($connect,"update orders set status=2 where id=$id");
         mysqli_close($connect);
      default :
       echo "bip nhau a";   
   }

?> 