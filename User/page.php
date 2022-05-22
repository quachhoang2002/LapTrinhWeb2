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
    <link rel="stylesheet" href="../bootstrap-5.1.3-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="../font/themify-icons/themify-icons.css">
    <script src="../bootstrap-5.1.3-dist/js/bootstrap.bundle.js"></script>
    <script   src="../jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body >
    <?php   
       require '../connect.php';
       $product_type=mysqli_query($connect,"select * from category");  
    ?>
   
  
   
    
     <?php require_once 'header.php' ?>



  <div class="container-fluid pb-5 gradient-custom-2 ">

     <div class="row">
           <div class="text-center mt-5 mb-5 fw-bolder" style="font-size: 50px;color:#403019"> KKH SHOP  </div>            
     </div>
    
    
      <div class="row d-flex   ">
          <div class="col-2 mt-5 ">
             <caption>
               <input type="text" name="search" value="">
                   <select name="type" id="">
                          <option value=""> All </option>
                          <?php foreach($product_type as  $each){?>          
                           <option value="<?php echo $each['id']?>"> <?php echo $each['Type'] ?> </option>
                           <?php } ?>  
                    </select>
               <button onclick="filter()">tim kiem</button>
              </caption>    
           </div>
       
          <div class="col-8 " style="background-color:whitesmoke ;">
            <div class="row d-flex " id="loadPage">
               
            
            </div>         
          </div>
  
       </div>
   </div> 



<?php require 'footer.php' ?>

</body>  
<script type="text/javascript">
    
    function PageNumber(page){
      var search=  $('input[name=search]').val();
      var type= $('select[name=type]').val();
      $('#loadPage').load('process.php?action=Page',{page:page,search:search,type:type})
      location.href="#"
    }

   function filter(){
     var search=  $('input[name=search]').val();
      var type= $('select[name=type]').val();
   
      $('#loadPage').load('process.php?action=Page',{search:search,type:type})
   }

  $('#loadPage').load('process.php?action=Page')
    function check(event) {
      var x = event.charCode || event.keyCode;
      if (x <48 || x > 57) {  
         event.preventDefault()
      }
    }

   function checkvalue(id){
        var quantity=$('#quantity_'+id).val();
        
          if(quantity<=0){
            $('#quantity_'+id).val(1)
          }  
         
          if(quantity!= parseInt(quantity)){
            quantity=$('#quantity_'+id).val(Math.round($('#quantity_'+id).val()))
          }
   }   
   
  function addtoCart(id){
       
          var name= $('#name_'+id).val() ;
          var price= $('#price_'+id).val() ;
          var image= $('#image_'+id).val() ;
          var user_id= $('#userID_'+id).val() ;
          var quantity=$('#quantity_'+id).val();
       
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
      
          var name= $('#name_'+id).val() ;
          var price= $('#price_'+id).val() ;
          var image= $('#image_'+id).val() ;
          var user_id= $('#userID_'+id).val() ;
          var quantity=$('#quantity_'+id).val();
     
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
