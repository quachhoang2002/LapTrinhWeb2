<?php 
require '../../connect.php';
$action = $_GET['action'];
 switch($action){
     case 'createProduct':
        $name=$_POST['name'];
        $price=$_POST['price'];
        $image=$_FILES['image'];
        $description=$_POST['description'];
        $manufacture_id=$_POST['manufacture_id'];
        $type=$_POST['type'];
        $target_dir='photos/';
        $file_name=time().basename(($image['name'])) ;  
        $target_file=$target_dir . $file_name;
        move_uploaded_file($image["tmp_name"],$target_file);
        
   
        
        mysqli_query($connect,"insert into product(Name,Price,product_type,Image,description,manufacture_id) values('$name',$price,'$type','$file_name','$description','$manufacture_id')");
        
        $error= mysqli_error($connect);
        echo $error;
        mysqli_close($connect);
        header('location:index.php'); 
        mysqli_close($connect);
        break;
    case 'createType':
          $type=$_POST['type'];
          mysqli_query($connect,"insert into category(Type) values('$type')") ;
          mysqli_close($connect);
          break;
     
     
}