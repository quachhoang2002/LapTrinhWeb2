<?php session_start() ?>
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
<?php 
     require('../connect.php');
     $id=$_SESSION['id'];
     $result =mysqli_query($connect,"select * from cart where user_id=$id");
     $result_total= mysqli_query($connect,"select sum(price*quantity) as tong from cart where user_id=$id");
     $total=mysqli_fetch_array($result_total)['tong'];
     $discount=1;
     if(isset($_SESSION['discount'])){
       $discount=$_SESSION['discount'];
     }
   
     
?>
<body>
       <?php require 'header.php' ?>
  <div class="card gradient-custom-2" >

        <div class="card-body">
      
          <div class="container">

            <div class="row">
              <div class="col-xl-12">   
                <ul class="list-unstyled float-end">
                  <li style="font-size: 30px; color: red;">Python Shop</li>
                  <li> 30 Binh Phu</li>
                  <li>123-456-789</li>
                  <li>mail@mail.com</li>
                </ul>
              </div>
            </div>
      
            <div class="row text-center">
              <h3 class="text-uppercase text-center mt-3" style="font-size: 40px;">Invoice</h3>
              <p><?php if(isset($_SESSION['id'])){ echo $_SESSION['fullname'];} ?></p>
            </div>
      
            <div class="row mx-3">
              <table class="table">
                <thead>
                  <tr>
                    <th></th>
                    <th scope="col">Product</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Amount</th>
                  </tr>
                </thead>
                <tbody>
                <?php foreach($result as $each): ?>
                  <tr>
                    <td> <img src="../admin/photos/<?php echo $each['image'] ?>" alt="" srcset="" style="width: 150px; height: 150px;"></td>
                    <td> <?php echo $each['product_name'] ?></td>
                    <td><?php echo $each['quantity'] ?></td>
                    <td><?php echo $each['price']*$each['quantity'] ?>vnd</td>
                  </tr> 
                 <?php endforeach ?>
                </tbody>
              </table>       
            </div>

        
            <hr>
            <div class="row">
              <div class="col-xl-8" style="margin-left:60px">
                <p class="float-end"
                  style="font-size: 30px; color: red; font-weight: 400;font-family: Arial, Helvetica, sans-serif;">
                  Total:
                  <span><?php echo $total*$discount ?>vnd</span></p>
              </div>   
            </div>

           <form class="row g-3" action="process.php?action=voucher" method="POST">
              <div class="col-auto">
                Voucher (Neu co)
              </div>
 
              <div class="col-auto">
                <label for="" class="visually-hidden">Nhap ma</label>
                <input type="text" name="voucher" value="<?php if(isset($_SESSION['code'])){ echo $_SESSION['code']; } ?>" class="form-control" placeholder="Voucher">
              </div>
 
              <div class="col-auto">
                <button type="submit" class="btn btn-primary mb-3">Apply</button>
              </div>
          </form>
             <?php  if(isset($_SESSION['error'])) : ?>  
                 <span class="text-danger text-center">  <?php echo $_SESSION['error'];   
                     unset($_SESSION['error']); ?> 
                 </span> 
             <?php endif  ?> 
            <hr>

            <div class="row mt-2 mb-5 ">
              <p class="fw-bold col-2">Date: <span class="text-muted" id="date" >  </span></p>

              <div class="col-xl-10 ">
                <form action="process.php?action=order" method="post" >
                   <input type="hidden" value="<?php echo $_SESSION['id']  ?>">
                   Name recive<input type="text" class="form-control w-50" name="name"  pattern="^[a-zA-Z]+(([',. -][a-zA-Z ])?[a-zA-Z]*)*$" required >         
                   Address recive<input type="text" class="form-control w-50" name="address" pattern=".{5,}" required>          
                   Phone recive<input type="text" class="form-control w-50"  name="phone" pattern="[0]{1}[0-9]{9}" required> 
                  <input type="hidden" name="total" value="<?php echo $total*$discount ?>">
                  
                  <a href="cart.php" class="btn btn-outline-secondary mt-2 w-25">Back</a>
                  <button class=" text-center btn btn-primary w-25 mt-2" >Pay</button>    
                </form>
              </div>

             </div>
            
      
          </div>
      
      
      
        </div>
       
      </div>

      <?php   
         unset($_SESSION['discount']);
         unset($_SESSION['code']);
         require 'footer.php' 
      ?>
</body>

     <script type="text/javascript">
         const date=new Date();
         let text=date.toLocaleDateString()
         document.getElementById("date").innerHTML = text;


     </script>
