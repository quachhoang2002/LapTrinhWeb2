
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
    <script src="../bootstrap-5.1.3-dist/js/bootstrap.bundle.min.js"></script>
    <script   src="../jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
  
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
      $result=mysqli_query($connect,"select cart.*,category.Type from cart join product on product.id=cart.product_id join category on product.product_type=category.id where cart.user_id=$user_id");
      $row=mysqli_num_rows($result);

      $result_total= mysqli_query($connect,"select sum(price*quantity) as total_price from cart where user_id=$user_id");
      $total=mysqli_fetch_array($result_total)['total_price'];

      $count_item=mysqli_query($connect,"select sum(quantity)  as total_item from cart where user_id =$user_id");
      $total_item=mysqli_fetch_array($count_item)['total_item'];
     
  ?>  
  <?php require 'header.php' ?>
  <?php if ($row>=1) : ?>
        
    

   
   <section class="vh-100 gradient-custom-2" >
      <div class="d-flex justify-content-center pt-5">
      <a href="../User/" class="align-self-center text-decoration-none fw-bolder" style="font-size:55px;color:#403019"> KKH Shop</a>
      </div>

    <div class="container h-75">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col">
          <p><span class="h2">Shopping Cart <i class="ti-shopping-cart"></i> </span><span class="h4" id="item">(<?php echo $total_item ?> item in your cart)</span></p>
  
          <div class="card mb-4">
            <div class="card-body p-4">
            <?php foreach($result as $each): ?>
              <div class="row align-items-center CartItem">
                <div class="col-md-2 ">
                  <img src="../admin/photos/<?php echo $each['image']; ?>" style="height:100px;width:150px"
                    class="img-fluid" alt="Generic placeholder image">
                </div>
                <div class="col-md-2  d-flex justify-content-center text-center ">
                  <div>
                    <p class="small text-muted pb-2">Name</p>
                    <p class="lead fw-normal mb-0"><?php echo $each['product_name'] ?> </p>
                  </div>
                </div>
                <div class="col-md-2  d-flex justify-content-center text-center">
                  <div>
                    <p class="small text-muted pb-2">Type</p>
                    <p class="lead fw-normal mb-0"><?php echo $each['Type'] ?></p>
                  </div>
                </div>
                
                
                <div class="col-md-2  d-flex justify-content-center text-center">
                  <div>
                    <p class="small text-muted pb-2">Quantity</p>
                    <p class="lead fw-normal mb-0"><input type="number" id="quantity_<?php echo $each['id']?>" min="0"  style="text-align:center"  onkeypress="check(event)" 
                                                                          onchange="update_data(<?php echo $each['id']?>)"  value="<?php echo $each['quantity']?>" > 
                    </p>
                  </div>
                </div>
                <div class="col-md-2  d-flex justify-content-center text-center">
                  <div>
                    <p class="small text-muted pb-2 ">Price</p>
                    <p class="lead fw-normal mb-0 "  id="price<?php echo $each['id'] ?>"> <?php echo $each['price'] ?> Vnd </p>
                  </div>
                </div>
                <div class="col-md-2  d-flex justify-content-center text-center">
                  <div>
                    <p class="small text-muted pb-2">Xoa</p>
                    <p class="lead fw-normal mb-0"><input type="button" class="btn btn-primary" value="xoa" onclick="delete_data(<?php  echo $each['id'] ?>)"></p>
                  </div>
                </div>
              </div>
              <?php endforeach ?>
              
  
            </div>
          </div>
  
          <div class="card mb-5">
            <div class="card-body p-4">
  
              <div class="float-end">
                <p class="mb-0 me-5 d-flex align-items-center">
                  <span class="small text-muted me-2">Order total:</span> 
                  <span
                    class="lead fw-normal" id="total"><?php echo $total ?> Vnd 
                  </span>
                </p>
              </div>
  
            </div>
          </div>
  
          <div class="d-flex justify-content-end">
            <a href="page.php" type="button" class="btn btn-light btn-lg me-2">Continue shopping</a>
            <a href="order.php"  type="button" class="btn btn-primary btn-lg" >Payment</a>
           </div>
  
        </div>
      </div>
    </div>
  </section>

  <?php else : ?>
    <section class="d-flex  flex-column justify-content-center align-items-center" style="background-color: aliceblue;min-height:500px"> 
     <h1> hay mua san pham </h1>   
     <a href="page.php" style="font-size:30px">Shopping</a>
    </section>
  <?php endif ?>
   
  

   <?php require 'footer.php' ?>


 <script type="text/javascript">

    function check(event) {
      var quantity=$("#quantity_"+id).val()
      var x = event.charCode || event.keyCode;
      if (x <48 || x > 57) {  
         event.preventDefault()
      }
    }

    function update_data(id){
        var quantity=$("#quantity_"+id).val()
         
         if(quantity<=0){ 
             if(confirm('ban muon xoa chu')==false){
              location.reload()
               return false
             } else {
               window.location.reload();
             }     
          } 
          
          $.ajax({
               url:"process.php?action=update",
               method:"POST",
               data:{id:id,quantity:quantity},
               success:function(data){
                  $("#total").load(location.href + " #total")
                  $("#item").load(location.href + " #item")
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