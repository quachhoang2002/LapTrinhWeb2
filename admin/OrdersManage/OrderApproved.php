     <?php     
       if(!isset($_SESSION['level'])){
        header('location:../admin-login/adminLogin-form.php');              
       }
        $result=mysqli_query($connect,"select *from orders where status=1 order by time DESC");
      ?> 
    <div class="container">
       <table class="table table-bordered border-dark text-center align-middle">
         <thead class="gradient-custom-4">
          <tr>
            <td>id</td>
            <td>customer_id</td>
            <td>Name</td>
            <td>Phone</td>
            <td>Address</td>
            <td>time</td>
            <td>total price</td>
            <td>status</td>
          </tr>      
        </thead>
        <tbody>
         <?php foreach($result as $each ) : ?>  
         <tr id="approve<?php echo $each['id']?>">
             <td><?php echo $each['id'] ?> </td>
             <td><?php echo $each['customer_id'] ?>     </td>
             <td><?php echo $each['name_receiver'] ?>   </td>
             <td><?php echo $each['phone_receiver'] ?>  </td>
             <td><?php echo $each['address_receiver'] ?></td>
             <td><?php echo $each['time'] ?>            </td>
             <td><?php echo $each['total_price'] ?>     </td>
             <td>Approved</td>     
         </tr>
        </tbody>
    </div>
         <?php endforeach ?>
     </table>
