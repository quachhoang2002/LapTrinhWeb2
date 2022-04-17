<?php  
   session_start();
  $action=$_GET['action'];
  require '../connect.php';
  
  switch($action){
    case 'register':
               $name=$_POST['name'];
               $username=$_POST['Username'];
               $phone =$_POST['phone'];
               $password_1=$_POST['password-1'];
               $password_2=$_POST['password-2'];
               $email=$_POST['email'];
               $resultUsername=mysqli_query($connect,"select * from user where username='$username'");
               $resultPhone=mysqli_query($connect,"select * from user where phone='$phone'");
               $resultEmail=mysqli_query($connect,"select * from user where email='$email'");

                   if(mysqli_num_rows($resultUsername)==1){

                       header('location:register-form.php');
                       $_SESSION['error']="Ten dang nhap da ton tai ";
                       $_SESSION['name']=$name;
                       $_SESSION['username']=$username;
                       $_SESSION['phone']=$phone;
                       $_SESSION['email']=$email;
                       exit;
                      } 
           
                   else if(mysqli_num_rows($resultPhone)==1){
                     header('location:register-form.php');
                     $_SESSION['error']="SDT da ton tai ";
                     $_SESSION['name']=$name;
                     $_SESSION['username']=$username;
                     $_SESSION['phone']=$phone;
                     $_SESSION['email']=$email;
                     exit;
                    } 
           
                   else if(mysqli_num_rows($resultEmail)==1){
                     header('location:register-form.php');
                     $_SESSION['error']="email da ton tai ";
                     $_SESSION['name']=$name;
                     $_SESSION['username']=$username;
                     $_SESSION['phone']=$phone;
                     $_SESSION['email']=$email;
                     exit;
                    } 
           
                   else if ( (isset($name)) &&(isset($username)) &&(isset($phone)) &&(isset($password_1)) &&(isset($password_2)) &&(isset($email))   ){
                     if($password_1!=$password_2) {
                         header('location:register-form.php');
                         exit;
                     } 
                     mysqli_query($connect,"insert into user(fullname,username,phone,password,email) values ('$name','$username','$phone',PASSWORD('$password_1'),'$email')"); 
                     header('location:register-proccess.php');
                     mysqli_close($connect);
                     $_SESSION['success']="dang ky thanh cong ";
                 
                  }  
                  else header('location:register-form.php');
                  break;
          

          
      case 'login':
                  $username=$_POST['username'];
                  $password=$_POST['password'];
   
                  if(isset($_POST['remember'])){
                     $remember= true;
                  }
                  else $remember= false;
                   require '../connect.php';
                  $result=mysqli_query($connect,"select *from user where username='$username' and password=PASSWORD('$password') ");
                  $getItem=mysqli_fetch_array($result);
                  if(mysqli_num_rows($result)==1){

                      $_SESSION['fullname']=$getItem['fullname'];
                      $_SESSION['id']=$getItem['id'];
                      header("location:../User");
                      if($remember){
                          setcookie('remember', $getItem['id'] ,time() + (86400 * 5),"/");
                      }
                  } 
                  else {
                       header("location:login-form.php");

                       $_SESSION['error']="sai tai khoan hoac mat khau ";
                       exit;
                      
                  } 
                    break;
            
      default: 
             echo"???";

   }



