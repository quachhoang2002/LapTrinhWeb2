<?php 
  
   $action=$_GET['action'];
   require '../../connect.php';
   switch($action){
      case "approve": 
         $id=$_POST['id'];
         mysqli_query($connect,"update orders set status=1 where id=$id");
         break;
      case "reject": 
         $id=$_POST['id'];
         mysqli_query($connect,"update orders set status=2 where id=$id");
         break;
      default :
       echo "bip nhau a";   
   }

?> 