    
    <div class="container-fluid header">
        <ul class="nav justify-content-end">
          <li class="nav-item">
            <a class="nav-link" href="orderStatus.php">Xem Don Hang <i class="ti-notepad"></i> </a>
          </li>    

          <li class="nav-item">        
                <?php if(isset($_SESSION['id'])) : ?>
                <a href="" class="nav-link"> <?php  echo $_SESSION['fullname']; ?> </a>
          </li>    
          <li class="nav-item">         
               <a class="nav-link" href="../login/logout.php"> Dang Xuat</a>
          </li>  
                 <?php  else : ?>
         
          <li class="nav-item">
            <a class="nav-link" href="#">Tai Khoan <i class="ti-user"></i></a>
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


    

      

     
 