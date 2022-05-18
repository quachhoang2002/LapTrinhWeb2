 <?php 
  
  if(!isset($_SESSION['level'])){
    header('location:../admin-login/adminLogin-form.php');
   }  

     $result=mysqli_query($connect,"select *from orders where status=0");
   ?> 
  <div class="container">
    <table class="table table-bordered border-dark text-center align-middle ">
      <thead class="gradient-custom-4">
         <tr>
           <td>id</td>
           <td>customer_id</td>
           <td>Name</td>
           <td>Phone</td>
           <td>Address</td>
           <td>time</td>
           <td>total price</td>
           <td>action</td>
           
         </tr>      
       </thead>
       <tbody>
        <?php foreach($result as $each):?>
         <tr id="approve<?php echo $each['id']?>">
              <td> <?php echo $each['id'] ?> </td>
              <td> <?php echo $each['customer_id'] ?>  </td>
              <td> <?php echo $each['name_receiver'] ?>  </td>
              <td> <?php echo $each['phone_receiver'] ?>  </td>
              <td> <?php echo $each['address_receiver'] ?>  </td>
              <td> <?php echo $each['time'] ?>  </td>
              <td> <?php echo $each['total_price'] ?>  </td>
              <td> 
                   <input type="button" class="btn btn btn-outline-primary" value="approve" onclick="approve( <?php echo $each['id'] ?> )" >  
                   <input type="button" value="Reject" class="btn btn btn-outline-danger" onclick="reject( <?php echo $each['id'] ?> )" > 
             </td>
         </tr>
      </tbody>
     <?php  endforeach ?>
    </table>
  </div>    

<script type="text/javascript">
    function approve(id){
       $.ajax({
           url:"OrdersManage/OrderApprove_Process.php?action=approve",
           method:"POST",
           data:{id:id},
           success:function(data){
                alert('da duyet')
                $('#approve'+id).remove();
              
           }

       })
    } 
    function reject(id){
       $.ajax({
           url:"OrdersManage/OrderApprove_Process.php?action=reject",
           method:"POST",
           data:{id:id},
           success:function(data){
                alert('da huy don')
                $('#approve'+id).remove();
           }

       })
    }



</script>
</html>