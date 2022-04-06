<?php 
   $id=$_POST['id'];
   require('../admin/connect.php'); 
   mysqli_query($connect,"delete from cart where id=$id")


?>
