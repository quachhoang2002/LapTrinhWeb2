<?php  session_start() ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="../jquery-3.6.0.min.js"></script>
</head> 
  <?php  
    require '../connect.php';
   $id=$_GET['id'];
   $sql="select*from product 
          where id=$id ";
    $result=mysqli_query($connect,$sql);
    $content=mysqli_fetch_array($result);
  
   ?>
<body> 
     <div> 
           <img src="../admin/product/photos/<?php  echo $content['Image'] ?>" alt="" srcset="" height="100px" >
          <div id="name"> <?php echo $content['Name'] ?> </div>
          <div id="price"> <?php echo $content['Price'] ?>  </div>
          <div > <?php echo $content['product_type'] ?>  </div>
          <div> <?php echo $content['description'] ?>  </div>
          <div> <?php echo $content['manufacture_id'] ?>  </div>
          <input type="number" value="1" name="quantity" min="1" max="50"   onchange="checkvalue()" > 
       
          <input type="hidden" name="image" value="<?php echo $content['Image'] ?>" >
           <input type="hidden" name="user_id" value="<?php if(isset($_SESSION['id'])) echo $_SESSION['id']; else echo "" ;?>" >
            
           <input type="button" onclick="addtoCart(<?php echo $content['id'] ?>)" value="addtoCart"> 
           <input type="button" onclick="order(<?php echo $content['id'] ?>)" value="order"> 
     </div>
</body>

 <script type="text/javascript"> 
     
  
     function checkvalue(){
        var quantity=$('input[name=quantity]').val()
        
          if(quantity<=0){
            $('input[name=quantity]').val(1)
          }  
         
          if(quantity!= parseInt(quantity)){
            quantity=$('input[name=quantity]').val(Math.round($('input[name=quantity]').val()))
          }
       } 
       
          function addtoCart(id){
          var name= $('#name').html()
          var price=$('#price').html()
          var image= $('input[name=image]').val()
          var user_id= $('input[name=user_id]').val() 
          var quantity=$('input[name=quantity]').val()
          
          if(!user_id){
            location.href="../login/login-form.php"
          }
              
        $.ajax({
             url:"process.php?action=addtocart",
             method:"post",
             data:{id:id,name:name,price:price,image:image,user_id:user_id,quantity:quantity},
             success:function(data){
                  alert('them thanh cong')
             }
           })
      } 
      
      function order(id){
          var name= $('#name').text()
          var price=$('#price').html()
          var image= $('input[name=image]').val()
          var user_id= $('input[name=user_id]').val() 
          var quantity=$('input[name=quantity]').val()
          
          if(!user_id){
            location.href="../login/login-form.php"
          }
              
        $.ajax({
             url:"process.php?action=addtocart",
             method:"post",
             data:{id:id,name:name,price:price,image:image,user_id:user_id,quantity:quantity},
             success:function(data){
                location.href="cart.php"
             }
           })
      }
     

  
 </script>
</html>