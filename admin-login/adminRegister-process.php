<?php 
 $fullname=$_POST['fullname'];
 $username=$_POST['username'];
 $password=$_POST['password'];
 $phone=$_POST['phone'];
 $level=$_POST['level'];
 require '../connect.php';
 $result=mysqli_query($connect,"insert into admin(fullname,username,password,phone_number,level) values('$fullname','$username',PASSWORD('$password'),'$phone',$level)");
echo mysqli_error($connect);
?>