 <?php session_start() ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>  

    

     <form action="process.php?action=register" method="POST" onsubmit="return validate()"> 
  

       Ten <input type="text" name="name" value="<?php if(isset($_SESSION['name']))   
                echo $_SESSION['name'];
                unset($_SESSION['name']);  ?>">
       <span id="errorName"> </span>
      <br>


       Ten Dang Nhap <input type="text" name="Username" value="<?php if(isset($_SESSION['username']))   
                 echo $_SESSION['username'];
                unset($_SESSION['username']);?>">
                  
               
      <span id="errorUserName" > </span>

       <br>
        
        So Dien Thoai <input type="text" name="phone" value="<?php if(isset($_SESSION['phone']))   
                echo $_SESSION['phone'];
                unset($_SESSION['phone']); ?>"> 
           <span id="errorPhone"> </span>

       
       <br>

       Mat Khau <input type="password" name="password-1" id="password-1">
       <span class="errorPw"> </span>
       <br>
         
       Nhap lai mat khau <input type="password" name="password-2" id="password-2">
       <span class="errorPw"> </span>
       <br>

       Email <input type="email" name="email" value="<?php if(isset($_SESSION['email']))   
                echo $_SESSION['email'];
                unset($_SESSION['email']); ?>" >  
       <span id="errorEmail"> </span>

       <br>
       
       <?php   if(isset($_SESSION['error']))   
                echo $_SESSION['error'];
                unset($_SESSION['error']);
        ?> 
       
       <br>
       
        <button >Dang ky</button>

        <span id="errorVPW"></span>
      
     
    </form>    
 <a href="login-form.php">Dang Nhap</a>
    
</body>
<script> 
       
  
       function validate(){
        
        var name= document.getElementsByName('name')[0].value;
        var username= document.getElementsByName('Username')[0].value;
        var phone=document.getElementsByName('phone')[0].value

        var password_1=document.getElementById('password-1').value;
        var password_2=document.getElementById('password-2').value;
        
       var email = document.getElementsByName('email')[0].value
        var error=0;
             
              if(name.trim()==''){
              document.getElementById('errorName').innerHTML="nhap ho ten"
              error=1;
            }

             if(username.trim()==''){ 
              document.getElementById('errorUserName').innerHTML="nhap ten dang nhap"
               error=1;
             }

            if(phone.trim()==''){
              document.getElementById('errorPhone').innerHTML="nhap sdt "
              error=1;
            }

             if (password_1 != password_2){
              document.getElementById('errorVPw').innerHTML=" khong trung mat khau"
             error=1;;
             }

            if(password_1==''||password_2==''){
              document.getElementsByClassName('errorPw')[0].innerHTML="nhap mat khau"
              document.getElementsByClassName('errorPw')[1].innerHTML="nhap lai mat khau"
              error=1;;
            } 

             if(email.trim()==''){
              document.getElementById('errorEmail').innerHTML="nhap email"
               error=1;
             } 

            if(error==1){
                return false;
            }

           
        

       }
    
</script>
</html>