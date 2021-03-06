<?php  session_start() ;
     if(!isset($_SESSION['level'])){
        header('location:../admin-login/adminLogin-form.php');              
       }
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
    <script src="../bootstrap-5.1.3-dist/js/bootstrap.bundle.min.js"></script>
    <script   src="../jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    
</head>
<body>
<div class="container-fluid">
    <div class="row flex-nowrap">
        <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-dark">
            <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
              <?php  if(isset($_SESSION['adminID'])):  ?> 
                <div class="dropdown pb-4 position-sticky ">
                    <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                      <img src="photos/1653489808Bánh lớp sừng trâu.jpg" alt="hugenerd" width="30" height="30" class="rounded-circle">
                      <span class="d-none d-sm-inline mx-1"> <?php echo $_SESSION['adminName']; ?></span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
                      <li><a class="dropdown-item" href="logout.php">Sign out</a></li>
                    </ul>
                </div>
               <?php endif ?>
                <a href="/" class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                    <span class="fs-5 d-none d-sm-inline">Menu</span>
                </a>
                <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
                   <li class="nav-item">
                        <a href="?" class="nav-link align-middle px-0">
                            <i class="ti-home"></i> <span class="ms-1 d-none d-sm-inline">Home</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="?side=Product" class="nav-link align-middle px-0">
                            <i class="ti-package"></i> <span class="ms-1 d-none d-sm-inline">Product</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="?side=ProductType" class="nav-link align-middle px-0">
                            <i class="ti-layers"></i> <span class="ms-1 d-none d-sm-inline">Product Type</span>
                        </a>
                    </li>
                  
                    <li>
                        <a href="#submenu1" data-bs-toggle="collapse" class="nav-link px-0 align-middle ">
                            <i class="ti-clipboard"></i> <span class="ms-1 d-none d-sm-inline">OrderList </span></a>
                           <div class="collapse nav flex-column ms-1" id="submenu1" data-bs-parent="#menu">
                               <ul >
                                  <li class="w-100">
                                      <a href="?side=CustomerOrder" class="nav-link px-0"> <span class="d-none d-sm-inline">Don Chua Xu Ly</span> 1</a>
                                  </li>
                                  <li>
                                      <a href="?side=OrderApproved" class="nav-link px-0"> <span class="d-none d-sm-inline">Don Da Xu Ly</span> 2</a>
                                  </li>
                              </ul>
                         </div>
                    </li>

                    <li>
                        <a href="#submenu2" data-bs-toggle="collapse" class="nav-link px-0 align-middle ">
                            <i class="ti-user"></i> <span class="ms-1 d-none d-sm-inline">Account </span></a>
                           <div class="collapse  nav flex-column ms-1" id="submenu2" data-bs-parent="#menu">
                               <ul >
                                  <li class="w-100">
                                      <a href="?side=CustomerAccount" class="nav-link px-0"> <span class="d-none d-sm-inline">Tai khoan khach hang</span> </a>
                                  </li>
                                  <li>
                                      <a href="?side=AdminAccount" class="nav-link px-0"> <span class="d-none d-sm-inline">Tai khoan nhan vien</span> </a>
                                  </li>
                              </ul>
                         </div>
                    </li>
                                    
                    <li>
                        <a href="?side=Manufactor" class="nav-link px-0 align-middle">
                         <i class="ti-briefcase"></i> <span class="ms-1 d-none d-sm-inline">Manufactor</span> </a>
                    </li>

                  <?php if (isset($_SESSION['level'])&& $_SESSION['level']>=1): ?>
                    <li class="nav-item">
                        <a href="?side=voucher" class="nav-link align-middle px-0">
                            <i class="ti-tag"></i> <span class="ms-1 d-none d-sm-inline">Voucher</span>
                        </a>
                    </li>
                 <?php  endif ?>

                 <?php if (isset($_SESSION['level'])&& $_SESSION['level']==2): ?>
                     <li>
                        <a href="?side=CreateAdmin" class="nav-link px-0 align-middle">
                        <i class="ti-bar-chart"></i> <span class="ms-1 d-none d-sm-inline">Tao admin</span> </a>
                    </li>
                 <?php  endif ?>

                </ul>
             
            </div>
        </div>
        <div class="col py-3 gradient-custom" >
            <h1 class='text-center fw-bolder mt-5 mb-5'> KKH SHOP</h1>
             <?php  require('../connect.php'); 
             $side='';
             if (isset($_GET['side'])){
              $side=$_GET['side'];
            }        
              switch($side){
                  case '':
                  require 'home.php';
                  break;

                  case 'Product':
                  require 'product/index.php';
                  break;
             
                  case 'ProductType':
                  require 'ProductType/index.php';
                  break;

                  case 'CustomerOrder';
                  require 'OrdersManage/CustomerOrder.php';
                  break;

                  case 'OrderApproved';
                  require 'OrdersManage/OrderApproved.php';
                  break;

                  case 'Manufactor':
                  require 'manufactor/index.php';
                  break;

               
                  case 'CustomerAccount':
                  require 'Account/UserAccountList.php';
                  break;

                  case 'AdminAccount':
                  require 'Account/AdminAccountList.php';
                  break;

                  case 'voucher':
                  require 'Coupon/index.php';
                  break;

                  case 'CreateAdmin':
                  require '../admin-login/adminRegister-form.php';
                  break;
                    
                  
                  default: 
                  echo 'ko co gi dau';
              }

               
               ?>
        </div>
    </div>
</div>
     
</body>
</html>