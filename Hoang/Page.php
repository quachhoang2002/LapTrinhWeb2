<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
     <div> </div>
      <?php
       $connect=mysqli_connect('localhost','root','','hoang');
      
       
      $page=1;
       if(isset($_GET['page'])){
        $page =$_GET['page'];
            
       } 

       $search="";
       if(isset($_GET['search'])){   
         $search=$_GET['search'];
          }  
       
       $itemSQL = "select count(*)from test1  where noi_dung  like '%$search%' ";
       $itemArray= mysqli_query($connect,$itemSQL);
       $ItemResult= mysqli_fetch_array($itemArray);
       $TotalPage= $ItemResult['count(*)'];
      
       $ItemOnPage= 1;
      $PerPage=ceil($TotalPage/$ItemOnPage);
      
      $DropItem=  $ItemOnPage*($page-1);
       
    
    
    $sql="select*from test1 
     where noi_dung  like '%$search%'
      limit $ItemOnPage
      offset $DropItem; 
      "  ; 
      
      
        $result=mysqli_query($connect,$sql);
      
            
       
      ?>   
        
     <table border="1"  >
         <caption>
           <form action="" >
              <input type="text" name="search" value="<?php echo $search ?>">


           </form>
         </caption>

      <tr >
        <td>Ma</td>
        <td>TEN</td>
        <td>NOI DUNG</td>
        <td> ANH</td>
        <td> Sua</td>
        <td>Xoa </td>
       
      </tr> 
     <?php 
   
       foreach($result as $test){?>
            <tr>  
                <td><?php  echo"$test[Ma]"     ?></td>
                <td> <?php echo"$test[Ten] "      ?>   </td>
                <td >    <a href="Content.php?ma=<?php echo $test['Ma'] ?>"> <?php echo"$test[noi_dung] "     ?> </a>    </td>
                <td>  <img src="<?php echo"$test[hinh_anh] "      ?> " alt="" height="100PX"> </td>
                <td> <a  href="FormUpdate.php?ma=<?php echo $test['Ma'] ?> "> Sua</a></td>
                <td>  <a href="Delete.php?ma=<?php echo $test['Ma'] ?> "> xoa </a>  </td>
              

            </tr>
                 
       
       <?php } ?> 
            

     </table>
     <?php  for($i=1;$i<=$PerPage;$i++){ ?>
                <a href="?page=<?php echo $i ?>&search=<?php echo $search ?>"> <button><?php echo $i ?></button></a> 



               <?php }  ?>
               <?php mysqli_close($connect) ?>
</body>
</html>