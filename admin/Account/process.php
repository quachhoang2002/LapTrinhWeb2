<?php 
session_start();
 $action=$_GET['action'];
 require '../../connect.php';
  switch($action){
      case 'admin':         
          $id= $_POST['id'];
          mysqli_query($connect,"update  admin set status=1 where id=$id");
          mysqli_close($connect);
          break;
      case 'user': 
           $id= $_POST['id'];
           mysqli_query($connect,"update  user set status=1 where id=$id");
           mysqli_close($connect);
           break;
      
  }
?>