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
           
                    if(mysqli_num_rows($resultPhone)==1){
                     header('location:register-form.php');
                     $_SESSION['error']="SDT da ton tai ";
                     $_SESSION['name']=$name;
                     $_SESSION['username']=$username;
                     $_SESSION['phone']=$phone;
                     $_SESSION['email']=$email;
                     
                     exit;
                    } 
           
                   if(mysqli_num_rows($resultEmail)==1){
                     header('location:register-form.php');
                     $_SESSION['error']="email da ton tai ";
                     $_SESSION['name']=$name;
                     $_SESSION['username']=$username;
                     $_SESSION['phone']=$phone;
                     $_SESSION['email']=$email;
                     exit;
                    } 
           
                   if ( (empty($name)) ||(empty($username)) ||(empty($phone)) ||(empty($password_1)) ||(empty($password_2)) ||(empty($email))   ){
                      $_SESSION['error']="nhap day du thong tinh";
                       header('location:register-form.php');
                       exit;     
                  }  
                  else {
                    mysqli_query($connect,"insert into user(fullname,username,phone,password,email) values ('$name','$username','$phone',PASSWORD('$password_1'),'$email')"); 
                    header('location:login-form.php');
                    mysqli_close($connect);
                   $_SESSION['success']="dang ky thanh cong ";
                  };
                  break;
          

          
      case 'login':
                  $username=mysqli_real_escape_string(($connect), $_POST['username']);
                  $password=mysqli_real_escape_string(($connect), $_POST['password']);
   
                  if(isset($_POST['remember'])){
                     $remember= true;
                  }
                  else $remember= false;
                   require '../connect.php';
                  $result=mysqli_query($connect,"select *from user where username='$username' and password=PASSWORD('$password') and status=0 ");
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



