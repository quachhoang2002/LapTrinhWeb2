<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body> 
    <?php  
   $ma=$_GET['ma'];
   $connect=mysqli_connect('localhost','root','','hoang');
   $sql="select*from test1 
          where ma=$ma ";
    $result=mysqli_query($connect,$sql);
    $content=mysqli_fetch_array($result);
  
   ?>
  <h1 >
  <?php 
   echo $content['noi_dung']. "<br>";

   echo $content['Ten']
   
  ?>


  </h1>
   
</body>
</html>