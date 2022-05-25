<?php 
require '../../connect.php';
$action = $_GET['action'];
 switch($action){
    case 'createType':
        $type=$_POST['type'];
        mysqli_query($connect,"insert into category(Type) values('$type')") ;
        mysqli_close($connect);
        header('location:../index.php?side=ProductType');
        break;
    case 'delete':
            $id =$_POST['id'];
            $sql=" delete from category where id=$id ";
            if(mysqli_query($connect,$sql)){
                  echo'xoa thanh cong';
            }
            else echo'khong the xoa';
            break;
    case 'update':
            $id =$_POST['id'];
            $type=$_POST['type'];
            mysqli_query($connect,"update category set Type='$type' where id='$id' ");
            header('location:../index.php?side=ProductType');
            break;
 }