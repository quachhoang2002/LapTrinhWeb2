
<?php 
session_start();
     require '../connect.php';
     $id=$_SESSION['id'];
     $result=mysqli_query($connect,"select *from orders where customer_id=$id ");

     ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="../jquery-3.6.0.min.js"></script>
</head>
<body>
      <table border="1">
           <tr>
               <td>ID</td>
               <td>Ten</td>
               <td>SDT</td>
               <td>DiaChi</td>
               <td>NgayDat</td>
               <td>TongTien</td>
               <td>xem chi tiet</td>
               <td>Tinh Trang</td>
           </tr>
          <?php foreach($result as $each){?>
                                  
                 <tr> 
                    <td><?php echo $each['id'] ?></td>
                    <td><?php  echo $each['name_receiver'] ?></td>
                    <td> <?php echo $each['phone_receiver'] ?></td>
                    <td><?php  echo $each['address_receiver'] ?></td>
                    <td><?php  echo $each['time'] ?></td>
                    <td><?php echo $each['total_price'] ?></td>
                    <td> <button onclick="showdetail(<?php echo $each['id'] ?>)">Xem chi tiet</button> </td>
                    <td>

                             <?php if ($each['status']==0){
                               echo "dang cho xu ly";                      
                             }      
                             if ($each['status']==1){
                             echo "da xu ly";                      
                             }  
                             if($each['status']==2){
                                 echo "Don da bi huy";
                             }
                             ?>

                    </td>
                    <td> 
                       <button <?php if($each['status']!=0){?> disabled <?php } ?> onclick="cancel(<?php echo $each['id'] ?>)" >
                         Huy Don
                       </button> 
                    </td>
                    
                 </tr>

            <?php }  ?>
        
      </table> 

      <div  id="load" style="display:none;">
         
        
      </div>
</body>
<script type="text/javascript">
         function cancel(id){
            $.ajax({
                url:'process.php?action=CancelBill',
                method:'post',
                data:{ id:id },
                success:function(data){
                   location.reload();
                }
            })
         }

        function showdetail(id){
         $('#load').show();
           $('#load').load("process.php?action=ShowDetail",{ 
             id:id,
           })
          
        } 
      function remove(){
         $('#load').hide();
      }
        
</script>
</html>