<?php 
   $id=$_POST['id'];
   require('../connect.php'); 
   mysqli_query($connect,"delete from cart where id=$id") 


?>
