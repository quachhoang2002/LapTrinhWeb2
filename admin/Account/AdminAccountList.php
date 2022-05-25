<?php  
      if(!isset($_SESSION['level']) ) {
      header('location:../admin-login/adminLogin-form.php');
        exit;
        
      } 
      if(($_SESSION['level'])<1){
          echo "ban khong co quyen truy cap ";
           exit;
      }
      $page=1;
      if(isset($_GET['page'])){
       $page =$_GET['page'];     
      } 

      $search="";
      if(isset($_GET['search'])){   
      $search=$_GET['search'];
         }  
 
      $itemSQL = "select count(*)from user  where username like '%$search%' ";
      $itemArray= mysqli_query($connect,$itemSQL);
      $ItemResult= mysqli_fetch_array($itemArray);
      $TotalPage= $ItemResult['count(*)'];
      $ItemOnPage= 8;
      $PerPage=ceil($TotalPage/$ItemOnPage); 
      $DropItem=  $ItemOnPage*($page-1);

      $result=mysqli_query($connect,"
      select * from admin 
      where level=0 and username like '%$search%'
      order by status asc 
      limit $ItemOnPage 
      offset $DropItem 
      ");
      
   ?>  
<div class="container">
     <div class="mt-5 mb-5">
        <form action="" method="GET">
         <caption >
            <input type="hidden" name="side" value="AdminAccount">
            <input class="" type="text" name="search" value="" placeholder="username">
               <button >tim kiem</button>
          </caption>   
         </form>
      </div>
  <table class="table table-bordered border-dark text-center align-middle ">
       <thead class="gradient-custom-4">
        <tr>
          <td>id</td>
          <td>Ten</td>
          <td> SDT </td>
          <td>Ten Dang Nhap </td>
          <td>Action</td>      
        </tr>    
      </thead>
      <tbody>
       <?php  foreach( $result as $each){?>
        <tr>
           <td> <?php echo $each['id'] ?> </td>
           <td> <?php echo $each['fullname'] ?> </td>
           <td> <?php echo $each['phone_number'] ?> </td>
           <td> <?php echo $each['username'] ?> </td>
           <td> 
             <div class="btn-group">
                <input type="button" value="Mo Khoa" class="btn btn-primary"  id="unblock_btn<?php echo $each['id'] ?>"  onclick="unblock(<?php echo $each['id'] ?>)"  <?php if($each['status']==0){ ?>   disabled  <?php } ?> > 
                <input type="button" value="Khoa tai khoan" class="btn btn-danger"  id="block_btn<?php echo $each['id'] ?>"  onclick="block(<?php echo $each['id'] ?>)"  <?php if($each['status']==1){ ?>   disabled  <?php } ?> > 
            </div> 
          </td>     
        </tr>            
      <?php  } ?>
      </tbody>
   </table>
            <nav aria-label="Page navigation example mb-2">
                <ul class="pagination justify-content-center mt-2">
                   <?php for($i=1;$i<=$PerPage;$i++) :?>
                    <li class="page-item"> <a  href="?side=CustomerAccount&page=<?php echo $i ?>&search=<?php echo $search ?>" class="page-link"> <?php echo $i ?> </a></li>
                   <?php endfor ?>
              </ul>
            </nav>
 </div>  
 


<script  type="text/javascript">
     function block(id){
            $.ajax({
              url:'Account/process.php?action=admin',
              method:'POST',
              data:{id:id},
              success:function(data){
               $('#block_btn'+id).attr('disabled','disabled') 
            
              }
              
            })
     }         

     function unblock(id){
            $.ajax({
              url:'Account/process.php?action=AdminUnblock',
              method:'POST',
              data:{id:id},
              success:function(data){
               $('#unblock_btn'+id).attr('disabled','disabled')             
              }              
            })
     } 
             
  </script>
