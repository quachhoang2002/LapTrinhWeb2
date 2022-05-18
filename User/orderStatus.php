
<?php 
session_start();
     require '../connect.php';
     if(empty($_SESSION['id'])){
      header('location:../login/login-form.php');
      exit;
     }

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
    <link rel="stylesheet" href="../bootstrap-5.1.3-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="../font/themify-icons/themify-icons.css">
    <script src="../bootstrap-5.1.3-dist/js/bootstrap.bundle.min.js"></script>
    <script   src="../jquery-3.6.0.min.js"></script>
</head>
<body>
    <?php require 'header.php' ?>

<div class="container-fluid" style="background-color:aliceblue">
   <h1 class="fw-bolder text-center pt-5" style="font-size:55px;color:#403019">KKH SHOP</h1>
    <div class="container d-flex align-items-center justify-content-center " style="min-height:500px">
    
       <table class="table table-bordered " id="OrderList">

          <thead>
               <tr>
                  <td>ID</td>
                  <td>Ten</td>
                  <td>Dia Chi</td>
                  <td>SDT</td>
                  <td>Thoi Gian</td>
                  <td>Tong Tien</td>
                  <td>Trang thai</td>
               </tr>
          </thead>    
          
          <tbody>
          <?php foreach($result as $each): ?>
              <tr>
                 <td><?php echo $each['id'] ?></td>
                 <td><?php  echo $each['name_receiver'] ?></td>
                 <td><?php  echo $each['phone_receiver'] ?></td>
                 <td><?php  echo $each['address_receiver'] ?></td>
                 <td><?php  echo $each['time'] ?></td>
                 <td><?php echo $each['total_price'] ?>$</td>
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
                 <td class="text-center"> <button onclick="showdetail(<?php echo $each['id'] ?>)" class="btn btn-primary " data-bs-toggle="modal" data-bs-target="#myModal">Chi tiet</button></td>  
                 <td>  <button <?php if($each['status']!=0){?> disabled <?php } ?> onclick="cancel(<?php echo $each['id'] ?>)" >
                         Huy Don
                       </button> 
                 </td>
              </tr>      
            <?php endforeach ?>
         </tbody>

       </table>

    </div>

    
</div> 


 <!-- The Modal -->
 <div class="modal" id="myModal">
   <div class="modal-dialog">
     <div class="modal-content">
 
       <!-- Modal Header -->
       <div class="modal-header">
         <h4 class="modal-title">Chi tiet don hang</h4>
         <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
       </div>
 
       <!-- Modal body -->
       <div class="modal-body">
          <table class="table table-bordered">
             <thead>
               <tr>
                  <th> San Pham</th>
                  <th> So Luong</th>
                  <th> Tong </th>
               </tr>
             </thead>    
               
               <tbody id="order_detail">
                    
               </tbody>
          </table>
       </div>
 
       <!-- Modal footer -->
       <div class="modal-footer">
         <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
       </div>
 
     </div>
   </div>
 </div>
     <?php require 'footer.php' ?>
</body>
<script type="text/javascript">
        function cancel(id){
            $.ajax({
                url:'process.php?action=CancelBill',
                method:'post',
                data:{ id:id },
                success:function(data){
                  $("#OrderList").load(location.href + " #OrderList")
                }
            })
         }

        function showdetail(id){
         $('#order_detail').show();
           $('#order_detail').load("process.php?action=ShowDetail",{ 
             id:id,
           })
          
        } 
      
        
</script>
</html> 