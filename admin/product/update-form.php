<?php  
   require '../../connect.php';
   $id=$_POST['id'];
   $reuslt=mysqli_query($connect,"select *from product  where id=$id ");
   $item=mysqli_fetch_array($reuslt); 

   $manufactor=mysqli_query($connect,'select * from manufacture');

   $product_type=mysqli_query($connect,"select * from category");

   $output=' 
   <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLabel">Update </h5>
      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
   </div>

  <div  class="modal-body  ">
    <form method="POST" action="product/process.php?action=update" enctype="multipart/form-data">    
             <input type="hidden" value='.$id.' name=id >        
             <div> Ten SP <input value='.$item['Name'].' type=text name=name  class="form-control" required> </div>      
             <div> Gia    <input value='.$item['Price'].' name=price class="form-control" required> </div>      
            
             <div> Loai     
                 <select name="type" id="" class="form-select">';
                     foreach($product_type as $type){
                         
                      $output.='<option value="'.$type['id'].'" ';
                      if($item['product_type']==$type['id']){
                       $output.='selected';
                      }         
                     $output.= ' >'.$type['Type'].' </option>';
                    }  
   $output.=     '</select>
             </div>     
            
              <div> Mieu Ta <textarea name=description class="form-control" required>'.$item['description'].'   </textarea> </div> 

             <div>  Nha SX
                 <select name="manufacture_id" id="" class="form-select">
                      ';
                      foreach ($manufactor as $manufacture){                      
                        $output.='<option value="'.$manufacture['Ma'].'" ';
                        if($item['manufacture_id']==$manufacture['Ma']){
                            $output.='selected';
                        }                   
                        $output.= ' >'.$manufacture['name'].'</option> ';                   
                    }
                   
   $output.='    </select>
             </div>
             <br>
             <img height="100px" src=" photos/'.$item['Image'].'" alt="">
             <div>  Image <input type="file" name="image"  value="" multiple />  </div>
             
            <div class="modal-footer mt-3">
             <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
             <button type="onsubmit" class="btn btn-primary">Save changes</button>
            </div>    
    </form>
  </div>
   ' ;
 
   echo $output;
   