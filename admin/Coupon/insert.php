<?php 
     $output='';
     
     $output.='
     <div class="modal-header">
       <h5 class="modal-title" id="exampleModalLabel">Create </h5>
      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
   </div>
    <div class="modal-body">
        <form action="Coupon/process.php?action=addVoucher" method="POST">
            Ma Giam Gia
           <input type="text" name="code" class="form-control" required > 
           <br>
            Giam gia theo %
           <input type="number" min=1 max=100 name="discount" class="form-control" required > 
           <br>
           <button class="btn btn-primary float-end">Add</button>   
       </form>
    </div>';

   echo $output;