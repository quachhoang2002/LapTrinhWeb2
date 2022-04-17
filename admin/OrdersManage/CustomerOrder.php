<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="../../jquery-3.6.0.min.js"></script>
</head>
      <?php 
       require '../../connect.php';
        $result=mysqli_query($connect,"select *from orders where status=0");
      ?> 
<body>

    
      <table border="1">
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
         
       <?php foreach($result as $each){?>
         <tr id="approve<?php echo $each['id']?>">
              <td> <?php echo $each['id'] ?> </td>
              <td>  <?php echo $each['customer_id'] ?>  </td>
              <td>   <?php echo $each['name_receiver'] ?>  </td>
              <td>   <?php echo $each['phone_receiver'] ?>  </td>
              <td>   <?php echo $each['address_receiver'] ?>  </td>
              <td>   <?php echo $each['time'] ?>  </td>
              <td>   <?php echo $each['total_price'] ?>  </td>
              <td >   <input type="button" value="approve" onclick="approve( <?php echo $each['id'] ?> )" >  </td>
              <td> <input type="button" value="Reject" onclick="reject( <?php echo $each['id'] ?> )" >  </td>
         </tr>

     <?php } ?>
      </table>
       
</body> 
<script type="text/javascript">
    function approve(id){
       $.ajax({
           url:"OrderApprove_Process.php?action=approve",
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
           url:"OrderApprove_Process.php?action=reject",
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