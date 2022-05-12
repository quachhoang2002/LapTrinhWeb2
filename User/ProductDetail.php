<?php  session_start() ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../bootstrap-5.1.3-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="font/themify-icons/themify-icons.css">
    <script src="../bootstrap-5.1.3-dist/js/bootstrap.min.js"></script>
    <script   src="../jquery-3.6.0.min.js"></script>
</head> 
  <?php  
    require '../connect.php';
   $id=$_GET['id'];
   $sql="select  product.*,category.Type,manufacture.name from product
          join category on product.product_type =category.id
          join manufacture on manufacture_id=manufacture.Ma
          where product.id=$id ";
    $result=mysqli_query($connect,$sql);
    $content=mysqli_fetch_array($result);
  
   ?>
   <?php require 'header.php' ?>
<body> 
  <div class="container-fluid pt-5 pb-5" style="background-color:aliceblue">
      <div class="row d-flex justify-content-center">
          <div class="col-4">
              <img src="../admin/product/photos/<?php echo $content['Image'] ?>" alt="" srcset="" style="width:500px;height:600px ">
          </div>
          <div class="col-4 mt-5 text-center">
          <div id="name"> <?php echo $content['Name'] ?> </div>
            <label>   <?php echo $content['Type'] ?></label>
            <hr>
             <span>              
                 <span class="fa fa-star checked"></span>
                 <span class="fa fa-star checked"></span>
                 <span class="fa fa-star checked"></span>
                 <span class="fa fa-star"></span>
                 <span class="fa fa-star"></span>
                 <p>Da ban:</p>
             </span>
             
            <p style="font-size:20px" class="p-3 bg-light">  <?php echo $content['Price'] ?> </p>
            <p style="font-size:20px;text-align:center" > <?php echo $content['description'] ?> </p>  
            <p style="font-size:20px;text-align: center;">NSX:<?php echo $content['name'] ?></p>
            <p><input type="number" value="1" name="quantity" min="1" max="50"   onchange="checkvalue()" >  </p>

             <input type="hidden" name="image" value="<?php echo $content['Image'] ?>" >
             <input type="hidden" name="user_id" value="<?php if(isset($_SESSION['id'])) echo $_SESSION['id']; else echo "" ;?>" >           
             <input type="button" class="btn btn-primary"  onclick="addtoCart(<?php echo $content['id'] ?>)" value="addtoCart"> 
             <input type="button" class="btn btn-primary" onclick="order(<?php echo $content['id'] ?>)" value="order"> 

             
       
          </div>
      </div>
   </div>

</body>
<?php require 'footer.php' ?>

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