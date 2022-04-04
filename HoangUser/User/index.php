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
       <form action="cart-process.php" method="POST" >
       <tr> 
       
        <td ><?php  echo $value['Name'] ?> </td>
        <td> <?php  echo $value['Price'] ?>   </td>
        <td> <img height="100px" src=" ../admin/product/photos/<?php  echo $value['Image'] ?>" alt="">  </td>
        <td> 
               <br>
         <input type="number" value="1" name="quantity" min="1"  onkeyup=" checkvalue()  "  > 
                <br>
          
        </td>
       <input type="hidden" name="id" value="<?php echo $value['id'] ?>">
       <input type="hidden" name="name" value="<?php echo $value['Name'] ?>">
       <input type="hidden" name="price" value="<?php echo $value['Price'] ?>">
       <input type="hidden" name="image" value="<?php echo $value['Image'] ?>">
       <input type="hidden" name="user_id" value="<?php 
                                                  if(isset($_SESSION['id']))
                                                              {
                                                                 echo $_SESSION['id'] ; 
                                                              } 
                                                  else echo''; ?>
                                                  ">
       
         <td> <button> addtocart </button>  </td>
   
        
      </tr> 
         
       </form>



   <?php }   ?>
     </table>

</html>
</body>  
<script>
  

      function checkvalue(){
        var quantity=document.getElementsByName('quantity')[0].value;
          if(quantity<=0){
            document.getElementsByName('quantity')[0].value=1
          }  
         if(Number.isInteger(quantity)==false){
            document.getElementsByName('quantity')[0].value=Math.round(document.getElementsByName('quantity')[0].value)
         } 
         
        

      }     

 
  

</script>
</html>