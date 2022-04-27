<?php    session_start();
        
           if(!isset($_SESSION['level'])){
            header('location:../../admin-login/adminLogin-form.php');
                     
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
    Manage manufactor
<br>


    <?php 
  
    
   if(isset($_SESSION['success']) ) {
   ?> 
    <span>    
       <?php 
      
       echo $_SESSION['success'] ;
       unset($_SESSION['success']);
          ?>
     </span> 
   <?php } 
   
    require('../../connect.php');
    $sql="select* from manufacture";
    $result=mysqli_query($connect,$sql);
  

    ?>

 <span  > <?php   
       if(isset($_SESSION['adminID'])){
        echo $_SESSION['adminName'];
       ?> <a href="../../login/logout.php"> Dang Xuat</a>
   <?php } ?> 
  </span>

     

    <br>
    <a href="manage/insert.php">ADD Manufacture</a>
    
    <?php include('../menu.php')  ?> 
  
    <table border="1" width="100%" >  
  <tr>
      <td>Ma</td>
      <td>Ten</td>
      <td>SDT</td>
      <td>Hinh Anh</td>
      <td>sua </td>
      <td>xoa</td>
  </tr>
 <?php foreach ($result as $value) {?>
 <tr>
     <td><?php echo $value['Ma'] ?></td>
     <td><?php echo $value['name'] ?></td>
     <td><?php echo $value['phone'] ?></td>
     <td >  <img src="<?php echo $value['image']?>" alt="" style="height: 50px;"></td>
     <td> <a href="manage/update-form.php?ma=<?php echo $value['Ma'] ?>"> Sua</a></td>
     <td> <a href="manage/process.php?action=delete&ma=<?php echo $value['Ma'] ?>">  xoa</a> </td>
 </tr> <?php }
     ?>
    </table>

 
</body> 
<script> 
      
        
  
        
     
    
        
                  
</script>
</html>