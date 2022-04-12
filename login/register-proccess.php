<?php  
$name=$_POST['name'];
$username=$_POST['Username'];
$phone =$_POST['phone'];
$password_1=$_POST['password-1'];
$password_2=$_POST['password-2'];
$email=$_POST['email'];

require '../connect.php';


      $resultUsername=mysqli_query($connect,"select * from user where username='$username'");
      $resultPhone=mysqli_query($connect,"select * from user where phone='$phone'");
      $resultEmail=mysqli_query($connect,"select * from user where email='$email'");
     
      
     $error=mysqli_error($connect);
     echo $error;



  if(mysqli_num_rows($resultUsername)==1){
      session_start();
      header('location:register-form.php');
      $_SESSION['error']="Ten dang nhap da ton tai ";
      $_SESSION['name']=$name;
      $_SESSION['username']=$username;
      $_SESSION['phone']=$phone;
      $_SESSION['email']=$email;
      exit;
     } 

     
  else if(mysqli_num_rows($resultPhone)==1){
    session_start();
    header('location:register-form.php');
    $_SESSION['error']="Ten dang nhap da ton tai ";
    $_SESSION['name']=$name;
    $_SESSION['username']=$username;
    $_SESSION['phone']=$phone;
    $_SESSION['email']=$email;
    exit;
   } 


   
  else if(mysqli_num_rows($resultEmail)==1){
    session_start();
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
    $error=mysqli_error($connect);
    echo $error;
    header('location:login-form.php');
    mysqli_close($connect);
    $_SESSION['success']="dang ky thanh cong ";

}  

     
 else header('location:register-form.php');



