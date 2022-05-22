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
    <script src="../bootstrap-5.1.3-dist/js/bootstrap.bundle.js"></script>
    <script   src="../jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
  <?php require 'header.php' ?>

  <?php 
     require '../connect.php';
     $id = $_SESSION['id'];
     $result=mysqli_query($connect,"select * from user where id = $id");
     $result=mysqli_fetch_array($result);
  ?>

  <div class="container rounded bg-white mt-5 mb-5">
      <div class="row">
         
          <div class="col-md-3 border-right">
              <div class="d-flex flex-column align-items-center text-center p-3 py-5" >
                  <img class="rounded-circle mt-5" width="150px" src="../admin/photos/<?php echo $result['image'] ?>">
      <form action="process.php?action=profile" method="POST" enctype="multipart/form-data">
                  <input type="hidden" name="id" value="<?php echo $_SESSION['id'] ?>">
                  <input type="file" name="image">
               </div>                
          </div>
     
          <div class="col-md-5 border-right">
              <div class="p-3 py-5">
                  <div class="d-flex justify-content-between align-items-center mb-3">
                      <h4 class="text-right">Profile Settings</h4>
                  </div>
                  <div class="row mt-2">
                      <div class="col-md-12"><label class="labels">Fullname</label><input type="text" class="form-control" placeholder="fullname" name="name"  value="<?php echo $result['fullname'] ?>" pattern="^[a-zA-Z]+(([',. -][a-zA-Z ])?[a-zA-Z]*)*$"  required></div>
                  </div>
                  <div class="row mt-3">
                      <div class="col-md-12"><label class="labels">Phone Number</label><input type="text" class="form-control" placeholder="enter phone number" name="phone" value="<?php echo $result['phone'] ?>" pattern="[0]{1}[0-9]{9}" required></div>
                      <div class="col-md-12"><label class="labels">Address</label><input type="text" class="form-control" placeholder="enter address" name="address" value="<?php echo $result['address'] ?>" pattern=".{5,}"  required></div>
                      <div class="col-md-12"><label class="labels">Email</label><input type="email" class="form-control" placeholder="enter email" name="email" value="<?php echo $result['email'] ?>"  pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required></div>
               
                  </div>
                         <span id="errorPW" class="text-danger"></span>
                          <?php  if(isset($_SESSION['error'])) : ?>  
                             <span class="text-danger text-center"> 
                                <?php echo $_SESSION['error'];   
                                 unset($_SESSION['error']); ?> 
                             </span>                     
                           <?php endif  ?>
                           
                           <?php  if(isset($_SESSION['success'])) : ?>
                            <span class="text-success"> 
                                <?php echo $_SESSION['success'];   
                                 unset($_SESSION['success']); ?>               
                             </span>  
                            <?php  endif ?>
                 
                  <div class="mt-5 text-center"><button class="btn btn-primary profile-button" type="submit">Save Profile</button></div>
              </div>
          </div>
      </form>

          <div class="col-md-4">
              <div class="p-3 py-5 mt-4">
                  <button type="button" class="btn btn-outline-secondary mt-5" data-bs-toggle="collapse" data-bs-target="#demo">Doi mat khau</button>
                 <form action="process.php?action=ChangePassword" method="POST" onsubmit="return validate()">
                   <div id="demo" class="collapse ">
                       <input type="hidden" value="<?php echo $_SESSION['id'] ?>" name="id">
                     <div class="col-md-12"><label class="labels">Old Password</label><input type="password" name="old-password" class="form-control" placeholder="old password" value="" required></div>

                     <div class="col-md-12"><label class="labels">New Password</label>
                              <input type="password" name="new-password" class="form-control" placeholder="new password" value="" 
                                title="can it nhat 1 chu so , 1 chu in hoa ,1 chu in thuong va do dai it nhat la 8"
                                pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required>
                     </div>

                     <div class="col-md-12"><label class="labels">Confirm New Password</label><input type="password" name="confirm-password" class="form-control" placeholder="confirm password" value=""></div>
                     <button type="submit">Change Password</button>
                   </div>
                  </form>
              </div>
          </div>
      </div>
  </div>
  </div>
  </div>
  <?php require 'footer.php' ?>
</body>
</html>

<script> 
       
  
       function validate(){
        var password_1=document.getElementsByName('new-password')[0].value;
        var password_2=document.getElementsByName('confirm-password')[0].value;     
             if (password_1 != password_2){
              document.getElementById('errorPW').innerHTML=" khong trung mat khau"
               return false;
             }          
       }
    
 
    
</script>