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
    <script src="../bootstrap-5.1.3-dist/js/bootstrap.min.js"></script>
    <script   src="../jquery-3.6.0.min.js"></script>
</head>
<body>

    <?php  
    
     require('../connect.php');
     $page=1;
     if(isset($_GET['page'])){
      $page =$_GET['page'];     
     } 
     $search="";
     if(isset($_GET['search'])){   
       $search=$_GET['search'];
        }  
     $type="";
     if(isset($_GET['type'])){   
       $type=$_GET['type'];
        }  
    $product_type=mysqli_query($connect,"select product_type from product");

     $sql = "select count(*)from product  where Name  like '%$search%' and product_type like '%$type%' ";
     $itemArray= mysqli_query($connect,$sql);
     $ItemResult= mysqli_fetch_array($itemArray);
     $TotalItem= $ItemResult['count(*)'];
    
     $ItemOnPage= 2;
     $PerPage=ceil($TotalItem/$ItemOnPage);
     $DropItem=  $ItemOnPage*($page-1);
    
  
     $sql="select*from product 
     where Name like '%$search%' and product_type like '%$type%'
     limit $ItemOnPage
     offset $DropItem; 
      "  ; 

      $result=mysqli_query($connect,$sql);?>


   <?php
     if(isset($_SESSION['success']) ) { ?> 
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
             ?> 
          <a href="../login/logout.php"> Dang Xuat</a>
             <?php } ?> 
      </span> 
    


         <caption>
           <form action="" >
              <input type="text" name="search" value="<?php echo $search ?>">
                <select name="type" id="">
                       <?php foreach($product_type as  $each){?>
                         <option value="<?php echo $each['product_type']?>"> <?php echo $each['product_type'] ?> </option>
                        <?php
                     } ?>  
                </select>
            <button>tim kiem</button>
           </form>
         </caption>
        
        
          

       
         </select>

 <div class="container-fluid">
     <a href="cart.php"> Gio Hang</a>
     
   <table class="table d-sm-table " style="border: 2px;" > 
        <tr>
            <td>Name</td>
            <td> Price </td>
            <td> Image</td>
            <td> quantity</td>
            <td>addtocart</td>
     
        </tr> 
        
        <?php foreach($result as $value) { ?>
      
            <tr> 
                <td id="a" ><?php  echo $value['Name'] ?> </td>
                <td> <?php  echo $value['Price'] ?>   </td>
                <td> <img height="100px" src=" ../admin/product/photos/<?php  echo $value['Image'] ?>" alt="">  </td>
                <td> 
                       <br>
                 <input type="number" value="1" name="quantity" min="1" max="50"    id="quantity_<?php echo $value['id'] ?>"  onchange="checkvalue(<?php echo $value['id'] ?>)" > 
                        <br>
                  
                </td>
                <td> <a href="ProductDetail.php?id=<?php echo $value['id'] ?>"> Chi Tiet San Pham </a> </td>
             
                <input type="hidden" name="id" value="<?php echo $value['id'] ?>" id="id_<?php echo $value['id'] ?>">
                <input type="hidden" name="name" value="<?php echo $value['Name'] ?>" id="name_<?php echo $value['id'] ?>">
                <input type="hidden" name="price" value="<?php echo $value['Price'] ?>" id="price_<?php echo $value['id'] ?>">
                <input type="hidden" name="image" value="<?php echo $value['Image'] ?>" id="image_<?php echo $value['id'] ?>" >
                <input type="hidden" name="user_id" value="<?php if(isset($_SESSION['id'])) echo $_SESSION['id']; else echo "" ;?>" id="userID_<?php echo $value['id'] ?>">
                
                  <td> <input type="button" class="btn btn-primary text-center " onclick="addtoCart(<?php echo $value['id'] ?>)" value="addtoCart"> </td>
                  <td> <input type="button" onclick="order(<?php echo $value['id'] ?>)" value="order"> </td>
               
            </tr>  
      
          <?php }  ?>
      </table>
          
   </div> 
  
   <?php  for($i=1;$i<=$PerPage;$i++){ ?>
           <a href="?page=<?php echo $i ?>&search=<?php echo $search ?>&type=<?php echo $type?>">
               <button><?php echo $i ?></button>
            </a> 
           <?php }
            mysqli_close($connect) ;
      ?>
    

 <?php  if(isset($_SESSION['id'])){?>
   <a href="orderStatus.php"> xem don hang</a>  
 <?php } ?>

  

           
    


</body>  
<script type="text/javascript">
  
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
