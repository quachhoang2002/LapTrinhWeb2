<?php 

$name=$_POST['name'];
$price=$_POST['price'];
$image=$_FILES['image'];
$description=$_POST['description'];
$manufacture_id=$_POST['manufacture_id'];

$target_dir='photos/';
$file_name=time().basename(($image['name'])) ;  
$target_file=$target_dir . $file_name;
move_uploaded_file($image["tmp_name"],$target_file);

require '../connect.php';

mysqli_query($connect,"insert into product(Name,Price,Image,description,manufacture_id) values('$name',$price,'$file_name','$description','$manufacture_id')");

$error= mysqli_error($connect);
echo $error;
mysqli_close($connect);
header('location:index.php');