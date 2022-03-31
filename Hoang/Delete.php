<?php require 'connect.php';
       $ma =$_GET['ma'];
    $sql=" delete from test1 where Ma=$ma ";
    $result=mysqli_query($connect,$sql);

    
    $loi=mysqli_error($connect);
echo $loi;


