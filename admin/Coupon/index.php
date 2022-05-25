<?php 
  $result= mysqli_query($connect,"select * from voucher ");

?>
<table class="table table-bordered border-dark align-middle text-center">
     <thead class="gradient-custom-4">
         <tr>
             <td>Id</td>
             <td>Code</td>
             <td>Discount</td>
             <td>Delete</td>
         </tr>
     </thead>
     <tbody>
         <?php foreach($result as $each ): ?>
            <tr>
                <td><?php echo $each['id'] ?></td>
                <td><?php echo $each['code'] ?></td>
                <td><?php echo $each['discount'] ?></td>
                <td > <input type="button"  class="btn btn-danger"  value="xoa"onclick="Delete(<?php echo $each['id']?>)"> </td>        
            </tr>
         <?php  endforeach ?>
     </tbody>
</table>

<div class="btn-group float-end">
  <button onclick="AddVoucher()" data-bs-toggle="modal" class="btn btn-success" data-bs-target="#exampleModal"  >AddVoucher</button>
</div>

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
               url:'Coupon/process.php?action=delete',
               method:'POST',
               data:{id:id },
               success:function(data){
                 alert(data )
                 window.location.reload()
               },
             })
           }
 function AddVoucher(){
    $('#load-form').load('Coupon/insert.php')
    }
</script>