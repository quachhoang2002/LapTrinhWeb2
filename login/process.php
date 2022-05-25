<?php  
   session_start();
  $action=$_GET['action'];
  require '../connect.php';
  
  switch($action){
    case 'register':
               $name=$_POST['name'];
               $username=trim($_POST['Username']);
               $phone =$_POST['phone'];
               $password_1=md5($_POST['password-1']);
               $email=$_POST['email'];
               $address=$_POST['address'];
               $resultUsername=mysqli_query($connect,"select * from user where username='$username'");
               $resultPhone=mysqli_query($connect,"select * from user where phone='$phone'");
               $resultEmail=mysqli_query($connect,"select * from user where email='$email'");
       
                   if(mysqli_num_rows($resultUsername)==1){

                       header('location:register-form.php');
                       $_SESSION['error']="Ten dang nhap da ton tai ";
                       exit;
                      } 
           
                    if(mysqli_num_rows($resultPhone)==1){
                     header('location:register-form.php');
                     $_SESSION['error']="SDT da ton tai ";                    
                     exit;
                    } 
           
                   if(mysqli_num_rows($resultEmail)==1){
                     header('location:register-form.php');
                     $_SESSION['error']="email da ton tai ";
                     exit;
                    } 
           
                   if ( (empty($name)) ||(empty($username)) ||(empty($phone)) ||(empty($password_1))  ||(empty($email))   ){
                      $_SESSION['error']="nhap day du thong tinh";
                       header('location:register-form.php');
                       exit;     
                  }  
                  else {
                    mysqli_query($connect,"insert into user(fullname,address,username,phone,password,email) values ('$name','$address','$username','$phone','$password_1','$email')"); 
                    header('location:login-form.php');
                    mysqli_close($connect);
      
                  };
                  break;
          

          
      case 'login':
                  $username=mysqli_real_escape_string(($connect), $_POST['username']);
                  $password=md5($_POST['password']);
                  if(isset($_POST['remember'])){
                     $remember= true;
                  }
                  else $remember= false;
                  require '../connect.php';
                  $result=mysqli_query($connect,"select *from user where username='$username' and password= '$password' ");
                  $getItem=mysqli_fetch_array($result);
                  if(mysqli_num_rows($result)==1 && $getItem['status']==0){

                      $_SESSION['fullname']=$getItem['fullname'];
                      $_SESSION['id']=$getItem['id'];
                      $_SESSION['avatar']=$getItem['image'];
                      header("location:../User");
                      if($remember){
                          setcookie('remember', $getItem['id'] ,time() + (86400 * 5),"/");
                      }
                      exit;
                  } 
                  else if($getItem['status']==1){
                    header("location:login-form.php");
                    $_SESSION['error']="Tai khoan da bi khoa";
                    exit;
                  }
                  else {
                       header("location:login-form.php");
                       $_SESSION['error']="sai tai khoan hoac mat khau ";
                       exit;                  
                  } 
                    break;
        case 'forgot-password':
                  $password=md5($_POST['password-1']);
                  $email=$_POST['email'];
                  $username=trim($_POST['username']);
                  $check_email=mysqli_query($connect,"select email from user where username='$username'");
                  $check_email=mysqli_fetch_array($check_email)['email'];
                  if($email == $check_email){
                    mysqli_query($connect,"update user set password='$password' where username='$username'");
                    mysqli_close($connect);
                    header('location:forgot-pw.php');
                  }
                  else {
                    $_SESSION['error']="email khong chinh xac ";
                    header('location:login-form.php');
                  }
                 
                    
      default: 
             echo"???";

   }



