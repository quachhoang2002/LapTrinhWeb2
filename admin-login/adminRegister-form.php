<?php session_start();
   if(isset($_SESSION['level'])){
       if($_SESSION['level'] ==1 ){
        
        
       }
       else {echo "ban khong co quyen dang ky";
        exit;
       } 
   } 
   else {echo "ban khong co quyen dang ky";
         exit;
        } 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="adminRegister-process.php" method="POST">
   Ten <input type="text" name="fullname">
   <br>
   Ten dang nhap <input type="text" name="username">
   <br>
   Mat Khau <input type="password" name="password">
   <br>
   So Dien Thoai <input type="text" name="phone">
   <br>
   Chuc vu <select name="level" id="">
     
          <option value="0">Nhan vien  </option>
          <option value="1">Quan Ly </option>
          
          
        
   </select>
 <button> Dang Ky</button>
    </form>
</body>
</html>