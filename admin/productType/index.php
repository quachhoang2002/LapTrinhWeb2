<?php
 $page=1;
 if(isset($_GET['page'])){
  $page =$_GET['page'];     
 } 

$itemSQL = "select count(*)from category ";
$itemArray= mysqli_query($connect,$itemSQL);
$ItemResult= mysqli_fetch_array($itemArray);
$TotalPage= $ItemResult['count(*)'];
$ItemOnPage= 8;
$PerPage=ceil($TotalPage/$ItemOnPage);
$DropItem=  $ItemOnPage*($page-1);

 $ProductType=mysqli_query($connect,
 "select * from category
 limit $ItemOnPage
 offset $DropItem;
 ")
  
?>

<div class="container">
   <table class="table table-bordered border-dark align-middle text-center">
       <thead class="gradient-custom-4">
         <tr>
             <td>Id</td>
             <td>Name</td>
             <td>Update</td>
             <td>Delete</td>
         </tr>
       </thead>
       
   
       <tbody>
       <?php foreach($ProductType as $Type): ?>
            <tr>
                <td><?php echo $Type['id'] ?></td>
                <td><?php echo $Type['Type'] ?></td>
                <td>  <input type="button" class="btn btn-info" value="sua" data-bs-toggle="modal" data-bs-target="#exampleModal" onclick="Update(<?php echo $Type['id']?>)" ></td>
                <td >  <input type="button"  class="btn btn-danger"  value="xoa"onclick="Delete(<?php echo $Type['id']?>)"> </td>   
            </tr>
        <?php endforeach ?>
       </tbody>
   </table>
   <nav aria-label="Page navigation example mb-2">
        <ul class="pagination justify-content-center mt-2">
           <?php for($i=1;$i<=$PerPage;$i++) :?>
           <li class="page-item">
              <a  href="?side=ProductType&page=<?php echo $i ?>" class="page-link"> <?php echo $i ?> </a>
            </li>
           <?php endfor ?>
      </ul>
    </nav>

  <div class="btn-group float-end">
     <button onclick="AddType()" data-bs-toggle="modal" class="btn btn-success" data-bs-target="#exampleModal"  >AddProduct</button>
  </div>
     
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content  d-flex justify-content-center" id="load-form">
       
          
       
      </div>
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
                    url:'productType/process.php?action=delete',
                    method:'POST',
                    data:{id:id },
                    success:function(data){
                      alert(data )
                      window.location.reload()
                    },
                  })
                }

        function Update(id){
            
             $('#load-form').load('productType/update-form.php',{id:id})
        }

        function AddType(){
          $('#load-form').load('productType/createType.php')
        }



     
   </script>