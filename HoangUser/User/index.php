<?php 
 session_start();
 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
    <script   src="../../jquery-3.6.0.min.js"></script>
</head>
<body>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

    <?php  
    
    require '../admin/menu.php';
     require('../admin/connect.php');
     $sql="select product.*, 
     manufacture.name as manufacture_name
     from product 
    
     join manufacture on manufacture.Ma=product.manufacture_id
     ";
     $result=mysqli_query($connect,$sql);






     if(isset($_SESSION['success']) ) {
      ?> 
       <span>    
          <?php 
          echo $_SESSION['success'] ;
          unset($_SESSION['success']);
             ?>
        </span> 
      <?php }  ?>

                  <span  > <?php   
           if(isset($_SESSION['id'])){
           echo $_SESSION['fullname'];
             ?> <a href="../../login/logout.php"> Dang Xuat</a>
                   
                   <?php } ?> 
                   </span> <?php


          ?> 
    
<a href="cart.php"> Gio Hang</a>

     <table border="1" > 
   <tr>
       <td>Name</td>
       <td> Price </td>
       <td> Image</td>
       <td> quantity</td>
       <td>addtocart</td>

   </tr> 
   
   <?php foreach($result as $value) { ?>
       <form action="" >
       <tr> 
       
        <td id="a" ><?php  echo $value['Name'] ?> </td>
        <td> <?php  echo $value['Price'] ?>   </td>
        <td> <img height="100px" src=" ../admin/product/photos/<?php  echo $value['Image'] ?>" alt="">  </td>
        <td> 
               <br>
         <input type="number" value="1" name="quantity" min="1" max="50" onmouseout=" checkvalue()" id="quantity_<?php echo $value['id'] ?>"  > 
                <br>
          
        </td>
       <input type="hidden" name="id" value="<?php echo $value['id'] ?>" id="id_<?php echo $value['id'] ?>">
       <input type="hidden" name="name" value="<?php echo $value['Name'] ?>" id="name_<?php echo $value['id'] ?>">
       <input type="hidden" name="price" value="<?php echo $value['Price'] ?>" id="price_<?php echo $value['id'] ?>">
       <input type="hidden" name="image" value="<?php echo $value['Image'] ?>" id="image_<?php echo $value['id'] ?>" >
       <input type="hidden" name="user_id" value="<?php if(isset($_SESSION['id'])) echo $_SESSION['id']; else echo "" ;?>" id="userID_<?php echo $value['id'] ?>">
       
         <td> <input type="button" onclick="addtoCart(<?php echo $value['id'] ?>)" value="addtoCart"> </td>
         <td> <input type="button" onclick="order(<?php echo $value['id'] ?>)" value="order"> </td>

      
        
      </tr> 
         
       </form>



   <?php }   ?>
     </table>
     
   

</html>
</body>  
<script type="text/javascript">
  

      function checkvalue(){
        var quantity=document.getElementsByName('quantity')[0].value;
          if(quantity<=0){
            document.getElementsByName('quantity')[0].value=1
          }  
         if(Number.isInteger(quantity)==false){
            document.getElementsByName('quantity')[0].value=Math.round(document.getElementsByName('quantity')[0].value)
         } 
         
        
      }     
      function addtoCart(id){
          var product_id= $('#id_'+id).val() ;
          var name= $('#name_'+id).val() ;
          var price= $('#price_'+id).val() ;
          var image= $('#image_'+id).val() ;
          var user_id= $('#userID_'+id).val() ;
          var quantity=$('#quantity_'+id).val();

        $.ajax({
             url:"cart-process.php",
             method:"post",
             data:{id:product_id,name:name,price:price,image:image,user_id:user_id,quantity:quantity},
             success:function(data){
               alert('them thanh cong')
             }
           })
      }

 function order(id){
  var product_id= $('#id_'+id).val() ;
          var name= $('#name_'+id).val() ;
          var price= $('#price_'+id).val() ;
          var image= $('#image_'+id).val() ;
          var user_id= $('#userID_'+id).val() ;
          var quantity=$('#quantity_'+id).val();

        $.ajax({
             url:"cart-process.php",
             method:"post",
             data:{id:product_id,name:name,price:price,image:image,user_id:user_id,quantity:quantity},
             success:function(data){
              location.href="cart.php"
             }
           })
 }
  

</script>
</html>