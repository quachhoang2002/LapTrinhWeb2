<?php 
require('../connect.php'); 
$id=$_POST['id'];
$quantity=$_POST['quantity'];
echo $quantity;
mysqli_query($connect,"update cart set quantity=$quantity where id=$id");
mysqli_query($connect,"delete from cart where quantity<=0")


?>