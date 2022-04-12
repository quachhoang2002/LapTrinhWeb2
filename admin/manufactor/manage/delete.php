<?php
$key=$_GET['ma'] ;
require '../../../connect.php';
mysqli_query($connect,"delete from manufacture where Ma=$key");
echo mysqli_error($connect);
mysqli_close($connect);
header('location:../index.php');


