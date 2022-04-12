<?php require '../connect.php';
       $ma =$_GET['id'];
    $sql=" delete from test1 where Ma=$ma ";
    
    if(mysqli_query($connect,$sql)){
          header('location:Page.php');
          
    } 
    else {
        header('location:Page.php'); 
    }

    
    $loi=mysqli_error($connect);
echo $loi;


