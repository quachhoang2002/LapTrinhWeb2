
   <?php   
   

     $page=1;
     if(isset($_GET['page'])){
      $page =$_GET['page'];     
     } 
     $search="";
     if(isset($_GET['search'])){   
       $search=$_GET['search'];
        }  
        
     $product_type=mysqli_query($connect,"select * from category"); 
     $type="";
     if(isset($_GET['type'])){   
       $type=$_GET['type'];
        }  
        
           
    if(isset($_GET['price_1']) && $_GET['price_1']!='' ){
      $price_1=$_GET['price_1'];
     }
     else{ 
       $price_1=0;
     }
   
     if(isset($_GET['price_2']) && $_GET['price_2']!=''){
      $price_2=$_GET['price_2'];
     }
     else{
       $price_2=100000000000;
     }

     $itemSQL = "select count(*)from product where Name like '%$search%'and product_type like '%$type%'  and ( price between $price_1 and $price_2 ) ";
     $itemArray= mysqli_query($connect,$itemSQL);
     $ItemResult= mysqli_fetch_array($itemArray);
     $TotalPage= $ItemResult['count(*)'];
    
     $ItemOnPage= 5;
     $PerPage=ceil($TotalPage/$ItemOnPage);
    
     $DropItem=  $ItemOnPage*($page-1);
     
     $sql="select product.*,category.Type,manufacture.name from product
      join manufacture on manufacture.Ma=product.manufacture_id
      join category on product.product_type = category.id
      where product.Name like '%$search%' and product.product_type like '%$type%' and ( price between $price_1 and $price_2 )
      limit $ItemOnPage
      offset $DropItem;
     ";
     $result=mysqli_query($connect,$sql);
    
    ?>
    <div class="container mt-3 ">
      <div class="mt-5 mb-5">
        <form action="" method="GET">
         <caption >
            <input type="hidden" name="side"  value="Product">
            <input class="" type="text" name="search" value="" placeholder="product name">
               <select name="type" id="">
                      <option value=""> All </option>
                      <?php foreach($product_type as  $each){?>          
                       <option value="<?php echo $each['id']?>"> <?php echo $each['Type'] ?> </option>
                       <?php } ?>  
                </select>
                <input type="text" placeholder="min" value="" name="price_1">
                     -- 
                 <input type="text" placeholder="max" value="" name="price_2">
               <button >tim kiem</button>
          </caption>   
         </form>
      </div> 
     <table class="table table-bordered border-dark align-middle text-center"  > 
       <thead class="gradient-custom-4">
          <tr>
            <td> Image</td>
            <td>Name</td>
            <td> Price </td>
            <td>Type</td>
            <td> Description</td>
            <td> manufacture</td>
            <td>Update</td>
            <td>Delete</td>
         </tr> 
        </thead>
        <tbody>
         <?php foreach($result as $value) :?>
           <tr>
             <td> <img height="100px" src=" photos/<?php  echo $value['Image'] ?>" alt="">  </td>
             <td><?php  echo $value['Name'] ?> </td>
             <td> <?php  echo $value['Price'] ?>   </td>
             <td><?php  echo $value['Type'] ?> </td>
             <td> <?php  echo $value['description'] ?> </td>
             <td><?php  echo $value['name'] ?>  </td>
             <td>  <input type="button" class="btn btn-info" value="sua" data-bs-toggle="modal" data-bs-target="#exampleModal" onclick="Update(<?php echo $value['id']?>)" ></td>
             <td >  <input type="button"  class="btn btn-danger"  value="xoa"onclick="Delete(<?php echo $value['id']?>)"> </td>        
           </tr> 
           <?php endforeach  ?>
        </tbody>
     </table>
            <nav aria-label="Page navigation example mb-2">
                <ul class="pagination justify-content-center mt-2">
                   <?php for($i=1;$i<=$PerPage;$i++) :?>
                   <li class="page-item">
                      <a  href="?side=Product&page=<?php echo $i ?>&search=<?php echo $search?>&type=<?php echo $type ?>&price_1=<?php echo $price_1?>&price_2=<?php echo $price_2?>" class="page-link"> <?php echo $i ?> </a>
                    </li>
                   <?php endfor ?>
              </ul>
            </nav>
          <div class="btn-group float-end">
            <button onclick="AddProduct()" data-bs-toggle="modal" class="btn btn-success" data-bs-target="#exampleModal"  >AddProduct</button>
          </div>
    </div>
   

 

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content  d-flex justify-content-center" id="load-form">
     
        
          
     
    </div>
  </div>
</div>

   <script type="text/javascript">
        function Delete(id){
          if(confirm('ban muon xoa chu')==false){
            return false;
          } 
            else 
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
