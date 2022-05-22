<?php 
   
  $output=' 
     <div class="modal-header">
       <h5 class="modal-title" id="exampleModalLabel">Create </h5>
       <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
     </div>
    <div class="modal-body">
     <form action="manufactor/process.php?action=insert" method="POST" >   
       Name <input type="text" name="name" id="name" class="form-control" required >
       Phone <input type="text" name="phone" class="form-control" required>
       Country <input type="text" name="country" class="form-control" required>
       <div class="modal-footer mt-3">
         <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
         <button type="onsubmit" class="btn btn-primary">Create</button>
       </div> 
    </div>
    </form>';
  echo $output;
 ?>
