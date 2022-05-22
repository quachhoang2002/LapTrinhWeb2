
    <?php 
   require '../../connect.php';
   $sql="select* from manufacture  ";
   $manufactor=mysqli_query($connect,$sql);
   $product_type=mysqli_query($connect,"select * from category");
      
   $output='';
   $output.= '
  <div class="modal-header">
    <h5 class="modal-title" id="exampleModalLabel">Create </h5>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
  </div>
 <div  class="modal-body">
  <form action="product/process.php?action=createProduct" method="POST" enctype="multipart/form-data" >
    Name <input type="text" name="name" class="form-control" required> 
    Price <input type="number" name="price" class="form-control" required> 
    Description <input type="text" name="description" class="form-control" required>'; 
    //type
    $output.= 'Product Type
    <select name="type" id="" class="form-select">';
      foreach($product_type as $each){
      $output.= '<option value="'.$each['id'].'">'.$each['Type'].'</option>';
        }  
    $output.='</select>';

     //manufac
    $output.= 'Manufacture 
    <select name="manufacture_id" id="" class="form-select" required>';
         foreach($manufactor as $manufacture){
     $output.= '<option value="'.$manufacture['Ma'].'">'.$manufacture['name'].'</option>';
          }              
     $output.= '</select>';
   

    $output.=
    'Image <input type="file" name="image"  required>
    <br>
     <div class="modal-footer mt-3">
             <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
             <button type="onsubmit" class="btn btn-primary">Create</button>
     </div>    

  </form>
  </div>';
  
  echo $output;
?>