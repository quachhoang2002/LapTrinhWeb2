
    <?php 
      require '../../connect.php';
      $sql="select* from manufacture  ";
      $manufactor=mysqli_query($connect,$sql);
      $product_type=mysqli_query($connect,"select * from category");
      
    $output='';
   $ouput= '
  <form action="product/process.php?action=createProduct" method="POST" enctype="multipart/form-data" >
    Name <input type="text" name="name"> 
    <br>
    Price <input type="number" name="price">
    <br>
    Image <input type="file" name="image">
    <br>
    Description <input type="text" name="description"> 
    <br>
    Manufacture 
    <select name="manufacture_id" id="">';

         foreach($manufactor as $manufacture){
     $ouput.= '<option value="'.$manufacture['Ma'].'">'.$manufacture['name'].'</option>';
          }              
     $ouput.=
    '</select>
       <br>
     <select name="type" id="">';
       foreach($product_type as $each){
       $ouput.= '<option value="'.$each['id'].'">'.$each['Type'].'</option>';
         }  

       $ouput.=
    '</select>
            <br>
    <button>submit </button>
  </form>';
  echo $ouput;
?>