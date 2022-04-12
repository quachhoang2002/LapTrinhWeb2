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
      require '../connect.php';
       $ma=$_GET['ma'];
       $sql="select*from test1 
              where Ma=$ma ";
        $result=mysqli_query($connect,$sql);
        $content=mysqli_fetch_array($result);
    
    ?>
      <form action="update.php" method="POST">
        <input type="hidden" name="ma" value="<?php echo $content['Ma'] ?>">
      <label for=""> Ten</label>
   <input type="text" name="name" value="<?php echo $content['Ten'] ?>"> <br> 
    Noi dung<textarea name="noi_dung" id="" cols="30" rows="10" ><?php echo $content['noi_dung'] ?></textarea>
    Hinh anh <input type="text" name="anh" value="<?php echo $content['hinh_anh']  ?>">
  <button>Sua</button>
      </form>   

  
</body>

</html>

          