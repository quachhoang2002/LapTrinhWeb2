<?php 
session_start();
$action=$_GET['action'];
 require '../../../connect.php';


 switch($action) {
   case 'insert':{
      if( empty($_POST['name']) || empty($_POST['phone']) || empty($_POST['image'])   ){
       $_SESSION['error']='hay dien day du';
       header('location:insert.php'); 
       exit;
      
      }
       $name=$_POST['name'];
       $phone=$_POST['phone'];
       $image=$_POST['image'];
       $sql="insert into manufacture(name,phone,image) values('$name','$phone','$image')";    
       mysqli_query($connect,$sql);
       $_SESSION['success']='Thanh Cong';
       header('location:../index.php');
       mysqli_close($connect);
   }    
       break;

      case 'update':{
        $ma=$_POST['ma'];
        $name=$_POST['name'];
        $phone=$_POST['phone'];
        $image=$_POST['image'];
        
        if(empty($name)||empty($phone)||empty($image)){
            $_SESSION['error']="hay dien thong tin";
            exit;
        } 
        $sql=" update manufacture
            set 
          name='$name',
          phone='$phone',
          image='$image'
          where Ma=$ma ;
         ";
        
         mysqli_query($connect,$sql);
         header("location:../index.php");          
          $_SESSION['success']='SUCCESS';
        }
          break;


       case 'delete':{
            $key=$_GET['ma'] ;
            mysqli_query($connect,"delete from manufacture where Ma=$key");
            echo mysqli_error($connect);
            mysqli_close($connect);
            header('location:../index.php');
        }    
        break;
   
}