
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<script   src="../../jquery-3.6.0.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<body> 
<?php 
     session_start();
       require('../admin/connect.php');
      $user_id=$_SESSION['id'];
      $result=mysqli_query($connect,"select * from cart where user_id=$user_id");
      $row=mysqli_num_rows($result);
      $result_total= mysqli_query($connect,"select sum(price*quantity) as tong from cart where user_id=$user_id");
       $total=mysqli_fetch_array($result_total)['tong'];
     
  ?> 
  <?php if ($row>=1){ ?>

     <table border="1" >
          <tr>
            <td></td>
            <td>Ten</td>
            <td>Gia</td>
            <td>So Luong</td>
            <td>Tong Tien</td>
          </tr>

         <?php foreach($result as $each){?>
         
           <tr>
                  <td> <img src=" ../admin/product/photos/<?php echo $each['image'] ?> " alt="" height="100px">  </td>
                  <td> <?php echo $each['product_name'] ?> </td>
                  <td>  <?php echo $each['price'] ?> </td>
                  <td >   <input type="number" id="quantity_<?php echo $each['id']?>" min="1"  style="text-align:center"  pattern="[1-99]* "onchange="edit_data(<?php echo $each['id']?>)"  value="<?php echo $each['quantity']?>"  > </td>
                  <td >  <?php echo $each['price']*$each['quantity'] ?>  </td>
             
          </tr>
                  
           
       <?php  } ?> 
           <tr>
             <td colspan="5" style="text-align: center;" > Tong Tien :<?php echo $total ?></td>
           </tr>
   </table> 

   <a href="update-cart.php">Update</a> 
   <a href="">Orders</a>
   
 
 <?php }   
  
       else echo "chua co san pham ";
       
       if(empty($_SESSION['id'])){
        header('location:../../login/login-form.php');
        exit;
       }

  ?>
  <script type="text/javascript">
   
      function edit_data(id){
     var quantity=document.getElementById("quantity_"+id).value
        if(quantity<=0){
          confirm("ban muon xoa truong nay chua ")
           if(confirm) return true 
           else return false 
          window.reload();
        } 



       $.ajax({
            url:"update-cart.php",
            method:"POST",
            data:{id:id,quantity:quantity},
            success:function(data){
                 location.reload();
            }


       })
       
        
       
         
        

      
       
      } 
     
     
  </script>
        

</body> 
</html>