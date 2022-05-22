
    <div class="container-fluid header">
        <ul class="nav justify-content-end">    
                <?php if(isset($_SESSION['id'])) : ?>

          <li class="nav-item ms-2">
             <a href="" class="nav-link " ><img class="avatar" src="../admin/photos/<?php echo $_SESSION['avatar'] ?>" alt="" srcset="" > </a> 
          </li>

          <li class="nav-item">     
              <a class="dropdown-toggle nav-link" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                <?php  echo $_SESSION['fullname']; ?> 
               </a>
              <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                <li><a class="dropdown-item d-flex justify-content-between" href="orderStatus.php">Order <i class="ti-notepad"></i> </a></li>
                <li><a class="dropdown-item d-flex justify-content-between" href="profile.php">Profile <i class="ti-user"></i></a></li>
                <li> <a class="dropdown-item d-flex justify-content-between" href="../login/logout.php"> SignOut <i class="fa fa-sign-out"></i></a> </li>
              </ul>       
          </li>  

                 <?php  else : ?>
         
          <li class="nav-item">
            <a class="nav-link" href="../login/login-form.php">Tai Khoan <i class="ti-user"></i></a>
          </li>
              <?php  endif ?>
        </ul>         
    </div>    
    
    <nav class="navbar navbar-expand-lg bg-dark navbar-dark sticky-top  " >
       <div class="container">

         <a class="navbar-brand " href="#"> 
             <img src="https://s2.coinmarketcap.com/static/img/coins/200x200/10407.png " class="" alt="" srcset="" style="height: 50px;"> 
         </a>

          <div class="navbar nav ">
             <ul class="navbar-nav ms-auto">
                 <li class="navbar-item  ">
                     <a href="index.php" class="nav-link"> Trang Chu </a>
                </li>

                 <li class="navbar-item  ">
                     <a href="page.php" class="nav-link"> San Pham  </a>
                </li>

                 <li class="navbar-item  ">
                     <a href="contract.php" class="nav-link"> Lien He   </a>
                 </li>         
             </ul>
             
         </div>
    
         <div class="navbar-items">
             <a href="cart.php" class="nav-item text-decoration-none "> Gio Hang <i class="ti-shopping-cart"></i>  </a>
         </div>  
         
       </div>
     </nav>


    

      

     
 