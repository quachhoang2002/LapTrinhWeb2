<?php 
session_start();
$action=$_GET['action'];
 require '../../connect.php';


 switch($action) {
   case 'insert':{  
       $name=$_POST['name'];
       $phone=$_POST['phone'];
       $country=$_POST['country'];
       $sql="insert into manufacture(name,phone,Country) values('$name','$phone','$country')";    
       mysqli_query($connect,$sql);
       header('location:../index.php');
       mysqli_close($connect);
   }    
       break;

      case 'update':{
        $ma=$_POST['id'];
        $name=$_POST['name'];
        $phone=$_POST['phone'];
        $country=$_POST['country'];         
        $sql=" update manufacture
            set 
          name='$name',
          phone='$phone',
          Country='$country'
          where Ma=$ma ;
         ";
        
         mysqli_query($connect,$sql);
         header("location:../index.php?side=Manufactor");          
          $_SESSION['success']='SUCCESS';
        }
        break;


       case 'delete':{
            $ma=$_POST['id'] ;
            if (mysqli_query($connect,"delete from manufacture where Ma=$ma")){
              echo 'xoa thanh cong';
            }
            else echo 'khong the xoa ';   
        }    
        break;
   
}