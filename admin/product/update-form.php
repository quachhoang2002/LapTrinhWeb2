<?php  
   require '../../connect.php';
   $id=$_POST['id'];
   $reuslt=mysqli_query($connect,"select *from product  where id=$id ");
   $item=mysqli_fetch_array($reuslt); 

   $manufactor=mysqli_query($connect,'select * from manufacture');

   $product_type=mysqli_query($connect,"select * from category");

   $output='

    <form method="POST" action="product/process.php?action=update" enctype="multipart/form-data">    
             <input type="hidden" value='.$id.' name=id >        
             <div> Ten SP <input value='. $item['Name'].' type=text name=name> </div>      
             <div> Gia    <input value='. $item['Price'].' name=price> </div>      
            
             <div> Loai     
                 <select name="type" id="">';
                     foreach($product_type as $type){
                      $output.='<option value="'.$type['id'].'">'.$type['Type'].' </option>                          
                     ';}  
   $output.=     '</select>
             </div>     
            
             <div> Mieu Ta <textarea name=description> '.$item['description'].'   </textarea> </div> 

             <div>  Nha SX
                 <select name="manufacture_id" id="">
                      ';
                      foreach ($manufactor as $manufacture){                      
                        $output.='<option value="'.$manufacture['Ma'].'">'.$manufacture['name'].'</option>';                   
                    }
                   
   $output.='    </select>
             </div>
             <br>
             <img height="100px" src=" photos/'.$item['Image'].'" alt="">
             <div>  Image <input type="file" name="image" name=image value="" multiple />  </div>
             
            <div class="modal-footer mt-3">
             <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
             <button type="onsubmit" class="btn btn-primary">Save changes</button>
            </div>    
    </form>

   ' ;
 
   echo $output;
