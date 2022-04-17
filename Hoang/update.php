<?php 
$ma=$_POST['ma'];
$ten=$_POST['name'];
$noi_dung=$_POST['noi_dung'];
$anh=$_POST['anh'];
require '../connect.php';
$sql="update test1 
        set 
            Ten='$ten' ,
            noi_dung='$noi_dung',
            hinh_anh='$anh' 
            where Ma=$ma; 
        
        
        ";




 if(mysqli_query($connect,$sql)){
     header('location:Page.php');
 } 
 {
    header('location:Page.php');
 }
mysqli_close($connect);
