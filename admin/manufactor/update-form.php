 <?php 
    require '../../connect.php';
    $ma=$_POST['id'];
    $sql="select* from manufacture where Ma=$ma";
    $result=mysqli_query($connect,$sql);
    $item=mysqli_fetch_array($result);

   $output='
   <div class="modal-header">
    <h5 class="modal-title" id="exampleModalLabel">Update </h5>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
   </div>
   <div class="modal-body">
    <form method="POST" action="manufactor/process.php?action=update" enctype="multipart/form-data">    
       <input type="hidden" value='.$item['Ma'].' name=id class="form-control"  required>        
       <div> Name <input value='. $item['name'].' type=text name=name class="form-control"  required> </div>        
       <div> Phone   <input value='. $item['phone'].' name=phone class="form-control"  required> </div>      
       <div> Country <input value='. $item['Country'].' type=text name=country class="form-control"  required> </div>   
       <div class="modal-footer mt-3">
         <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
         <button type="onsubmit" class="btn btn-primary">Save changes</button>
      </div> 
    </form>
   </div>
   ' ;

   echo $output;
?>
    

  


 
 
