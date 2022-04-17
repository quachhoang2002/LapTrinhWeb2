<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="../jquery-3.6.0.min.js"></script>
</head>
<body>
     <div> </div>
      <?php
        require '../connect.php';
      
       
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
                <td> <?php  echo"$test[Ma]"     ?> </td>
                <td id="name<?php echo"$test[Ma]"?>"> <?php echo"$test[Ten] "      ?>   </td>
                <td id="description<?php echo"$test[Ma]"?>">    <a href="Content.php?ma=<?php echo $test['Ma'] ?>"> <?php echo"$test[noi_dung] "     ?> </a>    </td>
                <td id="image<?php echo"$test[Ma]"?>">  <img src="<?php echo"$test[hinh_anh] "      ?> " alt="" height="100PX"> </td>
                <td > <input type="button" onclick="Update(<?php echo $test['Ma']?>)" value="Sua"> </td>
                <td >  <input type="button" onclick="Delete(<?php echo $test['Ma']?>)" value="Xoa"> </td>
              

            </tr>
                 
       
       <?php } ?> 
            

     </table>
     <?php  for($i=1;$i<=$PerPage;$i++){ ?>
                <a href="?page=<?php echo $i ?>&search=<?php echo $search ?>"> <button><?php echo $i ?></button></a> 
               <?php }  ?>
               <?php mysqli_close($connect) ?>
         
               
    
     
  <div id="update">

  </div>
            

</body>
<script type="text/javascript">
      
           function Delete(id){
                  $.ajax({
                    url:'Delete.php',
                    method:'GET',
                    data:{id:id },
                    success:function(data){
                      alert('xoa thanh cong ')
                    location.href='Page.php';
                    }

                  })
           }

           function Update(id){
                     var name=$('#name'+id).html()
                      var description=$('#description'+id).find('a').html()
                      console.log(description);
                      var image=$('#image'+id).find('img').attr('src')
                  
                      
                        $('#update').html(
                            ` <form action="update.php" method="POST">
                            <input value="${id}" name="ma" type="hidden"  > 
                               
                                <input value="${name}" name="name"  > 
                                </br>
                                <input  value="${description}" name="noi_dung"> 
                                </br>
                                 <input value="${image}" name="anh" >
                                 </br>
                                 <button> </button>                             
                                  </form>     
    
                              `
                            
                              
                        )
              
                        

                         
           }
 
</script>
</html>