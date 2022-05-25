<?php session_start() ;
   require('../connect.php');
   $product=mysqli_query($connect,"select product.*,ifnull(sum(order_detail.quantity),0) as quantitySale 
   from product 
   LEFT JOIN order_detail on order_detail.product_id=product.id
   LEFT JOIN orders on orders.id = order_detail.order_id 
   where  orders.status=1 
   Group By product.id
   ORDER BY quantitySale DESC
   limit 3");
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
    

  <body class="d-flex flex-column h-100">
    <main class="flex-shrink-0">
        <!-- Navigation-->
        <?php require 'header.php'   ?>
        <!-- Header-->
        <header class="bg-dark py-5">
            <div class="container px-5">
                <div class="row gx-5 align-items-center justify-content-center">
                    <div class="col-lg-8 col-xl-7 col-xxl-6">
                        <div class="my-5 text-center text-xl-start">
                            <h1 class="display-5 fw-bolder text-white mb-2">KKH BAKERY</h1>
                            <p class="lead fw-normal text-white-50 mb-4">Chúng tôi làm nên những chiếc bánh không những ăn ngon mà còn mang đến cảm nhận tuyệt vời khi bạn cắn vào hương vị xốp mềm đó</p>
                            <div class="d-grid gap-3 d-sm-flex justify-content-sm-center justify-content-xl-start">
                                <a class="btn btn-primary btn-lg px-4 me-sm-3" href="#features">Get Started</a>
                                <a class="btn btn-outline-light btn-lg px-4" href="#!">Learn More</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-5 col-xxl-6 d-none d-xl-block text-center justify-content-center">     
                               <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
                               <div class="carousel-inner">
                                 <div class="carousel-item active" data-bs-interval="2000">
                                   <img src="https://bepcuana.com/wp-content/uploads/2021/12/brodard-bakery.jpg" class="d-block w-100" alt="..." style="width:600px;height:400px ;">
                                 </div>
                                 <div class="carousel-item" data-bs-interval="2000">
                                   <img src="https://file.hstatic.net/1000313040/file/kt_001-_tiramisu_vu_ng_-_dsc05936_33e8eed7e04a4c13a7b9860601a5c9f0_grande.jpg" class="d-block w-100 " alt="..." style="width:600px;height:400px ;">
                                 </div>
                                 <div class="carousel-item" data-bs-interval="2000">
                                   <img src="https://mcdn.coolmate.me/image/June2021/quan-banh-ngot-22.jpg" class="d-block w-100 " alt="..." style="width:600px;height:400px ;">
                                 </div>
                               </div>
                               <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
                                 <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                 <span class="visually-hidden">Previous</span>
                               </button>
                               <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
                                 <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                 <span class="visually-hidden">Next</span>
                               </button>
                             </div>    
                    </div>
                </div>
            </div>
        </header>
        <!-- Features section-->
        <section class="py-5" id="features">
            <div class="container px-5 my-5">
                <div class="row gx-5">
                    <div class="col-lg-4 mb-5 mb-lg-0"><h2 class="fw-bolder mb-0">BÁNH MI KKH BAKERY – GIỮ TRUYỀN THỐNG, SỐNG HIỆN ĐẠI</h2></div>
                    <div class="col-lg-8">
                        <div class="row gx-5 row-cols-1 row-cols-md-2">
                            <div class="col mb-5 h-100">
                                <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3"><i class="bi bi-collection"></i></div>
                                <h2 class="h5">Banh Mi </h2>
                                <p class="mb-0">Đa dạng chủng loại từ truyền thống đến sáng tạo, luôn sẵn sàng cho sự lựa chọn của bạn.</p>
                            </div>
                            <div class="col mb-5 h-100">
                                <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3"><i class="bi bi-building"></i></div>
                                <h2 class="h5">Banh Ngot</h2>
                                <p class="mb-0">Những chiếc bánh giòn tan với hương vị ngọt ngào, tuyệt vời cho những tính đồ hảo ngọt.</p>
                            </div>
                            <div class="col mb-5 mb-md-0 h-100">
                                <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3"><i class="bi bi-toggles2"></i></div>
                                <h2 class="h5">Banh Kem</h2>
                                <p class="mb-0">Mềm mịn, béo ngọt và tươi mới, chính là những chiếc bánh kem nhỏ của chúng tôi</p>
                            </div>
                            <div class="col h-100">
                                <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3"><i class="bi bi-toggles2"></i></div>
                                <h2 class="h5">Dong Goi</h2>
                                <p class="mb-0">Sản phẩm đóng gói tiện dụng, nhưng vẫn đảm bảo ngon miệng và dinh dưỡng</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Testimonial section-->
        <div class="" style="position:relative">
            <img src="https://abcbakery.co/wp-content/themes/abc-bakery/images/foodPhoto.png" style="width:100% ;height:450px;" alt="" srcset=""> 
            <h1 style="position:absolute;top:0;color:white;width: 500px;margin-left:150px ;text-align: center;margin-top:50px"> Chúng tôi luôn mang đến những chiếc bánh tươi ngon nhất   </h1>         
        </div>
        <!-- Blog preview section-->
        <section class="py-5">
            <div class="container px-5 my-5">
                <div class="row gx-5 justify-content-center">
                    <div class="col-lg-8 col-xl-6">
                        <div class="text-center">
                            <h2 class="fw-bolder">Best-Selling</h2>
                            <p class="lead fw-normal text-muted mb-5">Top 3 Selling of bakery</p>
                        </div>
                    </div>
                </div>
             
                <div class="row gx-5">
                 <?php foreach($product as $each): ?>
                    <div class="col-lg-4 mb-5">
                        <div class="card h-100 shadow border-0">
                            <img class="card-img-top" src="../admin/photos/<?php echo $each['Image']?>" alt="..." />
                            <div class="card-body p-4">
                                <div class="badge bg-primary bg-gradient rounded-pill mb-2">Product</div>
                                <a class="text-decoration-none link-dark stretched-link" href="ProductDetail.php?id=<?php echo $each['id'] ?>"><h5 class="card-title mb-3"><?php echo $each['Name'] ?></h5></a>
                                <p class="card-text mb-0"><?php echo $each['description'] ?></p>
                            </div>
                            <div class="card-footer p-4 pt-0 bg-transparent border-top-0">
                                <div class="d-flex align-items-end justify-content-between">
                                    <div class="d-flex align-items-center">
          
                                        <div class="small">
                                            <div class="fw-bold"><?php echo $each['Price']?>vnd</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                  <?php endforeach ?>
                </div>
         
                <!-- Call to action-->
                <aside class="bg-primary bg-gradient rounded-3 p-4 p-sm-5 mt-5">
                    <div class="d-flex align-items-center justify-content-between flex-column flex-xl-row text-center text-xl-start">
                        <div class="mb-4 mb-xl-0">
                            <div class="fs-3 fw-bold text-white">New products, delivered to you.</div>
                            <div class="text-white-50">Sign up for our newsletter for the latest updates.</div>
                        </div>
                        <div class="ms-xl-4">
                            <div class="input-group mb-2">
                                <input class="form-control" type="text" placeholder="Email address..." aria-label="Email address..." aria-describedby="button-newsletter" />
                                <button class="btn btn-outline-light" id="button-newsletter" type="button">Sign up</button>
                            </div>
                            <div class="small text-white-50">We care about privacy, and will never share your data.</div>
                        </div>
                    </div>
                </aside>
            </div>
        </section>
    </main>
    <!-- Footer-->
    <?php require 'footer.php'  ?>
    <!-- Bootstrap core JS-->

</body>
   
     

</html>