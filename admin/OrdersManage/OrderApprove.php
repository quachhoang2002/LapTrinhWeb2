<?php 
   require '../../connect.php';
   $id=$_POST['id'];
   mysqli_query($connect,"update orders set status=1 where id=$id");
   mysqli_close($connect);
?> 