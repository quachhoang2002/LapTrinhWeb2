<?php  session_start() ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body> 
    <?php if(isset($_SESSION['error']  )){
 echo $_SESSION['error'];
 unset($_SESSION['error']);

    }
      ?>
    <form action="adminLogin-process.php" method="POST">
       Username <input type="text" name="username">
       PASSWORD <input type="password" name="password">
     <button>dang nhap </button>

    </form>
</body>
</html>