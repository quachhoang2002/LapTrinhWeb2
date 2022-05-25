<?php 
   require '../../connect.php';
   $id=$_POST['id'];
   $reuslt=mysqli_query($connect,"select *from category where id=$id ");
   $item=mysqli_fetch_array($reuslt); 
   $output='  
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Update </h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>
         <div  class="modal-body"> 
            <form action="productType/process.php?action=update" method="POST">
              The Loai
              <input type="hidden" value='.$id.' name=id >   
              <input type="text" name="type" value="'.$item['Type'].'" required > 
              <button class="btn btn-primary">Update</button>   
            </form>
         </div>    
         ';
   echo $output;
?>