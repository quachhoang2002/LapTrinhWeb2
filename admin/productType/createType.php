
<?php 
     $output='';
     
     $output.='
     <div class="modal-header">
       <h5 class="modal-title" id="exampleModalLabel">Create </h5>
      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
   </div>
    <div class="modal-body">
        <form action="productType/process.php?action=createType" method="POST">
            The Loai
           <input type="text" name="type" required > 
           <button class="btn btn-primary">Add</button>   
        </form>
    </div>';

   echo $output;

