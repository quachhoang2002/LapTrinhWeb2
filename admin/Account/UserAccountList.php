  <?php  
      if(empty($_SESSION['level'])) {
      header('location:../admin-login/adminLogin-form.php');
      exit;
       }
      $result=mysqli_query($connect,'select * from user');
     ?>  

    <div class="container">
     <table class="table table-bordered border-dark text-center align-middle ">
        <thead>
          <tr>
            <td>id</td>
            <td>Ten</td>
            <td> SDT </td>
            <td>Ten Dang Nhap </td>
            <td>Email</td>
          </tr>    
         </thead>
         <tbody>
            <?php  foreach( $result as $each): ?>
             <tr>
               <td> <?php echo $each['id'] ?> </td>
               <td> <?php echo $each['fullname'] ?> </td>
               <td> <?php echo $each['phone'] ?> </td>
               <td> <?php echo $each['username'] ?> </td>
               <td> <?php echo $each['email'] ?> </td>
               <td>  <input type="button" value="Khoa tai khoan"  id="block_btn<?php echo $each['id'] ?>"  onclick="block(<?php echo $each['id'] ?>)"  <?php if($each['status']==1){ ?>   disabled  <?php } ?> >   </td>             
             </tr>          
            <?php endforeach ?>
        </tbody>
      </table>
     </div>
  
    
 
<script  type="text/javascript">
     function block(id){
            $.ajax({
              url:'Account/process.php?action=user',
              method:'POST',
              data:{id:id},
              success:function(data){
               $('#block_btn'+id).attr('disabled','disabled')             
              }              
            })
     }            
  </script>
