<?php 


session_start() ;
   

 require('../connect.php');
 $action=$_GET['action'];

 
 
  switch($action){
     case "addtocart": 
          if(empty($_SESSION['id'])){
            header('location:../login/login-form.php');
            exit;
           }
         $quantity=$_POST['quantity'] ;
         $name=$_POST['name'] ;
         $price=$_POST['price'] ;
         $image=$_POST['image'] ;
         $user_id=$_POST['user_id'];
         $product_id=$_POST['id'];

         $result=mysqli_query($connect,"select*from cart where product_id=$product_id and user_id=$user_id");
         $row=mysqli_num_rows($result);        
        if($row<1){
           $sql=" 
               insert into cart(product_name,price,image,product_id,quantity,user_id) 
               values ('$name',$price,'$image',$product_id,$quantity,$user_id)  "; 
           mysqli_query($connect,$sql);              
         } 
        else {
             mysqli_query($connect,"update cart set quantity=quantity+$quantity where product_id=$product_id and user_id=$user_id");
         } 
         break;

     case "delete":
         $id=$_POST['id'];
         mysqli_query($connect,"delete from cart where id=$id") ; 
         break;

      
     case "update":
          $id=$_POST['id'];
          $quantity=$_POST['quantity'];
          mysqli_query($connect,"update cart set quantity=$quantity where id=$id");
          mysqli_query($connect,"delete from cart where quantity<=0");
          break;
     
     case "order":
          if(empty($_SESSION['id'])){
            header('location:../login/login-form.php');
            exit;
           }
          $name=$_POST['name'];
          $address=$_POST['address'];
          $phone=$_POST['phone'];
          $total=$_POST['total'];
          $customer_id=$_SESSION['id'];
       
          mysqli_query($connect,"insert into orders(customer_id,name_receiver,phone_receiver,address_receiver,total_price) values($customer_id,'$name','$address','$phone',$total)");
        
          $item=mysqli_query($connect,"select product_id,quantity from cart where user_id=$customer_id");
       
          $getOrderId=mysqli_query($connect,"select max(id) from orders where customer_id =$customer_id"); 
          $orderID=mysqli_fetch_array($getOrderId)['max(id)'];
     
          while($row = mysqli_fetch_assoc($item)){
                    $product_id=$row['product_id'];
                    $quantity=$row['quantity'];
                    mysqli_query($connect, "insert into order_detail(order_id,product_id,quantity) values($orderID,$product_id,$quantity)" );
                  
          }
          mysqli_query($connect,"delete from cart where user_id='$customer_id' ");
          header("location:index.php");
          break;

     case "CancelBill":
          $id=$_POST['id'];
          mysqli_query($connect,"update orders set status=2 where id=$id");
          mysqli_close($connect);
          break;

      case "ShowDetail":
           $id=$_POST['id'];
           $result=mysqli_query($connect,"select * from order_detail JOIN product on product.id = order_detail.product_id where order_id=$id");  
           $ouput='';
            
             foreach($result as $each){
                  $ouput.= ' 
                  <tr>
                    <td>'.$each['Name'].'</td>
                    <td>'.$each['quantity'].'</td>
                    <td>'.$each['quantity']*$each['Price'].'</td>
                   </tr>
                 ';
              }   
            
            echo $ouput;           
            break;

       case "Page":
             
              $page=1;
              if(isset($_POST['page'])){
               $page =$_POST['page'];     
              } 
              $search="";
              if(isset($_POST['search'])){   
                $search=$_POST['search'];
                 }  
              $type="";
              if(isset($_POST['type'])){   
                $type=$_POST['type'];
                 }  
              $user_id="";
              if(isset($_SESSION['id'])){
                $user_id=$_SESSION['id'];
              }
         
              $sql = "select count(*)from product  where Name  like '%$search%' and product_type like '%$type%' ";
              $itemArray= mysqli_query($connect,$sql);
              $ItemResult= mysqli_fetch_array($itemArray);
              $TotalItem= $ItemResult['count(*)'];
             
              $ItemOnPage= 8;
              $PerPage=ceil($TotalItem/$ItemOnPage);
              $DropItem=  $ItemOnPage*($page-1);
             
           
              $sql="select product.* ,category.id as category_id from product
              join category on product.product_type = category.id
              where Name like '%$search%' and product_type like '%$type%'
              limit $ItemOnPage
              offset $DropItem; 
               "  ; 
         
               $result=mysqli_query($connect,$sql);
                   $ouput='';
                 foreach($result as $value) {
                  $ouput.= '
                  <div class="col-xl-3 col-lg-4 col-sm-6 d-flex justify-content-center mt-5"   >  
                    <div class="card align-items-center" style="width:200px ;width:250px; box-shadow: 0 .5rem 1rem rgba(0,0,0,.15);"> 
                       <div class="card-img" > <img height="200px" style="width: 100%;" src=" ../admin/product/photos/'.$value['Image'].'" alt="" >  </div>
                       <div class="card-body text-center">
                           <div class="card-title"> <h5>'.$value['Name'].'</h5></div>
                           <div class="card-text">'.$value['Price'].'</div>               
                           <div class="card-text">                             
                             <input type="number" value="1" name="quantity" min="1" max="50" class="text-center"   id="quantity_'.$value['id'].'" onkeypress="check(event)"  onchange="checkvalue('.$value['id'].')" >                                              
                           </div>

                           <div> <a href="ProductDetail.php?id='.$value['id'].'"> Chi Tiet San Pham </a> </div>                           
                       </div>
                       <div class="mb-5"> 
                         <input type="button" class="btn btn-primary text-center" onclick="addtoCart('.$value['id'].')" value="addtoCart"> 
                         <input type="button" class="btn btn-primary text-center" onclick="order('.$value['id'].')" value="order">
                       </div>
                
                       <input type="hidden" name="id" value="'.$value['id'].' " id="id_'.$value['id'].'">
                       <input type="hidden" name="name" value="'.$value['Name'].'" id="name_'.$value['id'].'">
                       <input type="hidden" name="price" value="'.$value['Price'].'" id="price_'.$value['id'].'">
                       <input type="hidden" name="image" value="'.$value['Image'].'" id="image_'.$value['id'].'" >
                       <input type="hidden" name="user_id" value="'.$user_id.'" id="userID_'.$value['id'].'">
                                         
                 
                   </div>  
                 </div>
                  ' ;
                 } ; 
                  
             
                 $ouput.='<nav aria-label="Page navigation example mb-2">
                            <ul class="pagination justify-content-center mt-2">';
                 for($i=1;$i<=$PerPage;$i++){
                  $ouput.= '  <li class="page-item"> <button onclick="PageNumber('.$i.')" class="page-link">'.$i.'</button></li>
                         ';
                  };

                 $ouput.='  </ul>
                          </nav>';
                 echo $ouput;               
                 break;


      default: 
       echo "khong co cai gi dau ";
          
  }  
  
?> 
