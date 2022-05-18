
   <?php   
     $sql="select* from product
     join manufacture on manufacture.Ma=product.manufacture_id
     ";
     $result=mysqli_query($connect,$sql);
    ?>
    <div class="container mt-3 ">
      <div class="mt-5 mb-5">
         <caption >
            <input class="" type="text" name="search" value="">
               <select name="type" id="">
                      <option value=""> All </option>
                      <?php foreach($product_type as  $each){?>          
                       <option value="<?php echo $each['id']?>"> <?php echo $each['Type'] ?> </option>
                       <?php } ?>  
                </select>
               <button onclick="filter()">tim kiem</button>
          </caption>   
      </div> 
     <table class="table table-bordered border-dark align-middle text-center"  > 
       <thead class="gradient-custom-4">
          <tr>
            <td>Name</td>
            <td> Price </td>
            <td> Image</td>
            <td> Description</td>
            <td> manufacture</td>
            <td>Change</td>
            <td>Delete</td>
         </tr> 
        </thead>
        <tbody>
         <?php foreach($result as $value) :?>
           <tr>
             <td><?php  echo $value['Name'] ?> </td>
             <td> <?php  echo $value['Price'] ?>   </td>
             <td> <img height="100px" src=" photos/<?php  echo $value['Image'] ?>" alt="">  </td>
             <td> <?php  echo $value['description'] ?> </td>
             <td><?php  echo $value['name'] ?>  </td>
             <td>  <input type="button" class="btn btn-primary" value="sua" data-bs-toggle="modal" data-bs-target="#exampleModal" onclick="Update(<?php echo $value['id']?>)" ></td>
             <td >  <input type="button"  class="btn btn-primary"  value="xoa"onclick="Delete(<?php echo $value['id']?>)"> </td>        
           </tr> 
           <?php endforeach  ?>
        </tbody>
     </table>
            <button onclick="AddProduct()" data-bs-toggle="modal" data-bs-target="#exampleModal"  >AddProduct</button>
    </div>
   

 

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
        <div id="load-form" class="modal-body">
          
       </div>
    </div>
  </div>
</div>

   <script type="text/javascript">
        function Delete(id){
                  $.ajax({
                    url:'product/process.php?action=delete',
                    method:'POST',
                    data:{id:id },
                    success:function(data){
                      alert(data )
                      window.location.reload()
                    },
                  })
                }
        function Update(id){
             $('#load-form').load('product/update-form.php',{id:id})
        }

        function AddProduct(){
          $('#load-form').load('product/insert.php')
        }

     
   </script>
</html> 