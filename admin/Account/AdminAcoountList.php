<?php  session_start() ;
      if(!isset($_SESSION['level']) ) {
      header('location:../../admin-login/adminLogin-form.php');
        exit;
        
      } 
      if(($_SESSION['level'])!=1){
          echo "ban khong co quyen truy cap ";
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
    <script src="../../jquery-3.6.0.min.js"></script>
</head> 
<body>
   <?php 
      require('../../connect.php');
      $result=mysqli_query($connect,'select * from admin where level=0');
      
   ?>  
<div class="container">
  <table class="table table-bordered border-dark text-center align-middle ">
       <thead class="gradient-custom-2">
        <tr>
          <td>id</td>
          <td>Ten</td>
          <td> SDT </td>
          <td>Ten Dang Nhap </td>      
        </tr>    
      </thead>
      <tbody>
       <?php  foreach( $result as $each){?>
        <tr>
           <td> <?php echo $each['id'] ?> </td>
           <td> <?php echo $each['fullname'] ?> </td>
           <td> <?php echo $each['phone_number'] ?> </td>
           <td> <?php echo $each['username'] ?> </td>
           <td>  <input type="button" value="Khoa tai khoan"  id="block_btn<?php echo $each['id'] ?>"  onclick="block(<?php echo $each['id'] ?>)"  <?php if($each['status']==1){ ?>   disabled  <?php } ?> >
           <?php  if (isset($_SESSION['level']) && $_SESSION['level']==1 ) { ?>
           <td><input type="button" value="sua" onclick="update(<?php echo $each['id'] ?>)" ></td>
           <?php } ?>          
        </tr>            
      <?php  } ?>
      </tbody>
   </table>
 </div>  
 

</body> 
<script  type="text/javascript">
     function block(id){
            $.ajax({
              url:'process.php?action=admin',
              method:'POST',
              data:{id:id},
              success:function(data){
               $('#block_btn'+id).attr('disabled','disabled') 
            
              }
              
            })
     }         
      
     
  
          

     </script>
</html>