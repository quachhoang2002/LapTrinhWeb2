<?php 
 $id= $_POST['id'];
 require '../../connect.php';
 mysqli_query($connect,"update  user set status=1 where id=$id");
 mysqli_close($connect);

?>