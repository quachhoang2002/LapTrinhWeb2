
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <script   src="../jquery-3.6.0.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>

<body> 
<?php 
     session_start();
     if(empty($_SESSION['id'])){
      header('location:../login/login-form.php');
      exit;
     }
       require('../connect.php');
      $user_id=$_SESSION['id'];
      $result=mysqli_query($connect,"select * from cart where user_id=$user_id");
      $row=mysqli_num_rows($result);
      $result_total= mysqli_query($connect,"select sum(price*quantity) as tong from cart where user_id=$user_id");
       $total=mysqli_fetch_array($result_total)['tong'];
     
  ?>  
  <a href="index.php"> Mua Hang</a>
  <?php if ($row>=1){ ?>
        
     <table border="1" >
          <tr>
            <td></td>
            <td>Ten</td>
            <td>Gia</td>
            <td>So Luong</td>
            <td>Tam Tinh</td>
          </tr>

         <?php foreach($result as $each){?>
         
           <tr >
                  <td> <img src=" ../admin/product/photos/<?php echo $each['image'] ?> " alt="" height="100px">  </td>
                  <td> <?php echo $each['product_name'] ?> </td>
                  <td id="price<?php echo $each['id'] ?>">  <?php echo $each['price'] ?> </td>
                  <td > <input type="number" id="quantity_<?php echo $each['id']?>" min="0"  style="text-align:center"  pattern="[1-30]*" onchange="edit_data(<?php echo $each['id']?>)"  value="<?php echo $each['quantity']?>" > </td>
                  <td id="temp<?php echo $each['id'] ?>" class="temp" >  <?php echo $each['price']*$each['quantity'] ?>  </td>
                 <td> <input type="button" value="xoa" onclick="delete_data(<?php  echo $each['id'] ?>)"> </td>
          </tr>
                  
           
       <?php  } ?> 
           <tr>
             <td colspan="5" style="text-align: center;" id="total" > Tong Tien :<?php echo $total ?></td>
           </tr>
   </table> 

  
   <a href="order.php" >Orders</a>
   
 
 <?php }   
  
       else echo "chua co san pham ";
       
       
      

  ?>
  <script type="text/javascript">
   
      function edit_data(id){
     var quantity=$("#quantity_"+id).val()
      
        if(quantity<=0){ 
          if(confirm('ban muon xoa chu')==false){
           location.reload()
            return false
          } else {
            $('#temp'+id).parent().remove();}
          
       } 

       if(quantity!= parseInt(quantity)){
        window.location.reload() 
        return false
       }   

      

       $.ajax({
            url:"process.php?action=update",
            method:"POST",
            data:{id:id,quantity:quantity},
            success:function(data){
                 var price=parseInt($('#price'+id).html())
                 var total=0
            $('#temp'+id).html(quantity*price)  
    
            
            $('.temp').each(function(){
                    total+=parseFloat($(this).html()) ;
                    console.log(total);               
                 }) 

                if(total<=0){
                    location.reload();
                 }
             
              $('#total').html('Tong Tien :'+total);
           }

         }) 
   
     }  

        function delete_data(id){
          
        if(confirm("ban muon xua nay chu")==true){
            $.ajax({ 
            url:"process.php?action=delete",
            method:"POST",
            data:{id:id},
            success:function(data){
              window.location.reload();
            }
          })
        } 
         else return false;
         
     } 
     
     
  </script>
        

</body> 
</html>