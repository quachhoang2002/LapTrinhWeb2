<?php  session_start() ;
      if(empty($_SESSION['level'])) {
      header('location:../../admin-login/adminLogin-form.php');
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
      $result=mysqli_query($connect,'select * from user');
      
   ?>  
    
    <table border="1">
       <tr>
           <td>id</td>
           <td>Ten</td>
           <td> SDT </td>
           <td>Ten Dang Nhap </td>
           <td>Email</td>
       </tr>    
     
       <?php  foreach( $result as $each){?>
        <tr>
                <td> <?php echo $each['id'] ?> </td>
                <td> <?php echo $each['fullname'] ?> </td>
                <td> <?php echo $each['phone'] ?> </td>
                <td> <?php echo $each['username'] ?> </td>
                <td> <?php echo $each['email'] ?> </td>
                 <td>  <input type="button" value="Khoa tai khoan"  id="block_btn<?php echo $each['id'] ?>"  onclick="block(<?php echo $each['id'] ?>)"  <?php if($each['status']==1){ ?>   disabled  <?php } ?> >   </td> 
                 
        </tr>
              
      <?php  } ?>

      
     
    </table>
    
      <div id="update"> 
        
      </div>

    

</body> 
<script  type="text/javascript">
     function block(id){
            $.ajax({
              url:'process.php?action=user',
              method:'POST',
              data:{id:id},
              success:function(data){
               $('#block_btn'+id).attr('disabled','disabled') 
            
              }
              
            })
     }         
   
  
          

     </script>
</html>