 <?php 
  
     if(!isset($_SESSION['level'])){
       header('location:../admin-login/adminLogin-form.php');
     }  

     $page=1;
     if(isset($_GET['page'])){
      $page =$_GET['page'];     
     } 

     $search="";
     if(isset($_GET['search'])){   
     $search=$_GET['search'];
    }
     $itemSQL = "select count(*)from orders where status=0  and name_receiver like '%$search%'  ";
     $itemArray= mysqli_query($connect,$itemSQL);
     $ItemResult= mysqli_fetch_array($itemArray);
     $TotalPage= $ItemResult['count(*)'];
     $ItemOnPage= 8;
     $PerPage=ceil($TotalPage/$ItemOnPage);
    
     $DropItem=  $ItemOnPage*($page-1);
     
     $result=mysqli_query($connect,
     "select *from orders
      where status=0  and name_receiver like '%$search%'
      order by time DESC
      limit $ItemOnPage 
      offset $DropItem;");         
   ?> 
  <div class="container">
     <div class="mt-5 mb-5">
        <form action="" method="GET">
         <caption >
            <input type="hidden" name="side" value="CustomerOrder">
            <input class="" type="text" name="search" value="" placeholder="name receiver">
               <button >tim kiem</button>
          </caption>   
         </form>
      </div> 
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
           <td>details</td>
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
              <td><button onclick="showdetail(<?php echo $each['id'] ?>)" class="btn btn-primary " data-bs-toggle="modal" data-bs-target="#myModal">Chi tiet</button></td>
              <td> 
                   <input type="button" class="btn btn btn-outline-primary" value="approve" onclick="approve( <?php echo $each['id'] ?> )" >  
                   <input type="button" value="Reject" class="btn btn btn-outline-danger" onclick="reject( <?php echo $each['id'] ?> )" > 
             </td>
         </tr>
      </tbody>
     <?php  endforeach ?>
    </table>
            <nav aria-label="Page navigation example mb-2">
                <ul class="pagination justify-content-center mt-2">
                   <?php for($i=1;$i<=$PerPage;$i++) :?>
                   <li class="page-item"> <a  href="?side=OrderApproved&page=<?php echo $i ?>" class="page-link"> <?php echo $i ?> </a></li>
                   <?php endfor ?>
              </ul>
            </nav>
  </div> 
  
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
    function showdetail(id){
         $('#order_detail').show();
           $('#order_detail').load("OrdersManage/OrderApprove_Process.php?action=ShowDetail",{ 
             id:id,
           })
          
        } 


</script>
</html>